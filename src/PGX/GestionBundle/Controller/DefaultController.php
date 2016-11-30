<?php

namespace PGX\GestionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        if (false === $this->get('security.context')->isGranted(
                'IS_AUTHENTICATED_REMEMBERED '
            )) {

            if ($this->get('security.context')->isGranted('ROLE_SUPER_ADMIN')) {
                return $this->redirect($this->generateUrl('pgx_principal_index'));
            }

            elseif ($this->get('security.context')->isGranted('ROLE_ADMIN')) {
                return $this->redirect($this->generateUrl('pgx_principal_index'));
            }
            elseif ($this->get('security.context')->isGranted('ROLE_SURVEILLANT')) {
                return $this->redirect($this->generateUrl('pgx_surveillant_index'));
            }
            elseif ($this->get('security.context')->isGranted('ROLE_PROFESSEUR')) {
                return $this->redirect($this->generateUrl('pgx_professeur_index'));
            }
            elseif ($this->get('security.context')->isGranted('ROLE_ELEVE')) {
                return $this->redirect($this->generateUrl('pgx_eleve_index'));
            }
        }

        $pas_de_rôle = "true";

        return $this->redirect($this->generateUrl('fos_user_security_login',array('pas_de_role'=>$pas_de_rôle)));
    }

    public function logoAction()
    {
        $etablissement = $this->getDoctrine()
            ->getRepository('PGXGestionBundle:Etablissement')
            ->findBy(
                array(),
                array(),
                1
            );


        return $this->render("PGXGestionBundle:Default:logo.html.twig",array(
            "etablissement" => $etablissement
        ));
    }

    public function boxeInfoAction(){

        $em = $this->getDoctrine()->getManager();

        //le nombre de surveillants :
        $nbresurveillants = $em->createQuery(
            'SELECT COUNT(u) FROM PGXUserBundle:User u WHERE u.roles LIKE :roles'
        )->setParameter('roles', '%ROLE_SURVEILLANT%')->getSingleScalarResult();

        //le nombre de professeurs :
        $nbreprofesseurs = $em->createQuery(
            'SELECT COUNT(u) FROM PGXUserBundle:User u WHERE u.roles LIKE :roles'
        )->setParameter('roles', '%ROLE_PROFESSEUR%')->getSingleScalarResult();

        //le nombre d'eleves :
        $nbreeleves = $em->createQuery(
            'SELECT COUNT(u) FROM PGXUserBundle:User u WHERE u.roles LIKE :roles'
        )->setParameter('roles', '%ROLE_ELEVE%')->getSingleScalarResult();

        //les nouveau d'eleves :
        $anneeencours = date("Y");
        $requ = $this->getDoctrine()->getEntityManager()
            ->getConnection()
            ->prepare("select COUNT(id) as nouveaux from fos_user WHERE roles LIKE '%ROLE_ELEVE%' AND first_login LIKE '%$anneeencours%'");
        $requ->execute();
        $resultats = $requ->fetchAll();

        //->setParameter('firstlogin', "%$anneeencours%")


        return $this->render('PGXGestionBundle:Default:boxeInfo.html.twig', array(
            "nbresurveillants" => $nbresurveillants,
            "nbreprofesseurs" => $nbreprofesseurs,
            "nbreeleves" => $nbreeleves,
            "resultats" => $resultats,
        ));
    }

    public function profilAction()
    {
        return $this->render('PGXGestionBundle:Default:profil.html.twig',array(
            //...
        ));
    }

    public function uploadimageAction()
    {
        $this->functions();

        /*defined settings - start*/
        ini_set("memory_limit", "99M");
        ini_set('post_max_size', '20M');
        ini_set('max_execution_time', 600);
        define('IMAGE_SMALL_DIR', './uploades/small/');
        define('IMAGE_SMALL_SIZE', 50);
        define('IMAGE_MEDIUM_DIR', './uploades/medium/');
        define('IMAGE_MEDIUM_SIZE', 250);
        /*defined settings - end*/

        if(isset($_FILES['image_upload_file'])){
            $output['status']=FALSE;
            set_time_limit(0);
            $allowedImageType = array("image/gif",   "image/jpeg",   "image/pjpeg",   "image/png",   "image/x-png"  );

            if ($_FILES['image_upload_file']["error"] > 0) {
                $output['error']= "Error in File";
            }
            elseif (!in_array($_FILES['image_upload_file']["type"], $allowedImageType)) {
                $output['error']= "You can only upload JPG, PNG and GIF file";
            }
            elseif (round($_FILES['image_upload_file']["size"] / 1024) > 4096) {
                $output['error']= "You can upload file size up to 4 MB";
            } else {
                /*create directory with 777 permission if not exist - start*/
                createDir(IMAGE_SMALL_DIR);
                createDir(IMAGE_MEDIUM_DIR);
                /*create directory with 777 permission if not exist - end*/
                $path[0] = $_FILES['image_upload_file']['tmp_name'];
                $file = pathinfo($_FILES['image_upload_file']['name']);
                $fileType = $file["extension"];
                $desiredExt='jpg';
                $fileNameNew = rand(333, 999) . time() . ".$desiredExt";
                $path[1] = IMAGE_MEDIUM_DIR . $fileNameNew;
                $path[2] = IMAGE_SMALL_DIR . $fileNameNew;

                if (createThumb($path[0], $path[1], $fileType, IMAGE_MEDIUM_SIZE, IMAGE_MEDIUM_SIZE,IMAGE_MEDIUM_SIZE)) {

                    if (createThumb($path[1], $path[2],"$desiredExt", IMAGE_SMALL_SIZE, IMAGE_SMALL_SIZE,IMAGE_SMALL_SIZE)) {
                        $output['status']=TRUE;
                        $output['image_medium']= $path[1];
                        $output['image_small']= $path[2];
                    }
                }
            }
            echo json_encode($output);
        }
    }

    public function functions()
    {
        function createDir($path){
            if (!file_exists($path)) {
                $old_mask = umask(0);
                mkdir($path, 0777, TRUE);
                umask($old_mask);
            }
        }

        function createThumb($path1, $path2, $file_type, $new_w, $new_h, $squareSize = ''){
            /* read the source image */
            $source_image = FALSE;

            if (preg_match("/jpg|JPG|jpeg|JPEG/", $file_type)) {
                $source_image = imagecreatefromjpeg($path1);
            }
            elseif (preg_match("/png|PNG/", $file_type)) {

                if (!$source_image = @imagecreatefrompng($path1)) {
                    $source_image = imagecreatefromjpeg($path1);
                }
            }
            elseif (preg_match("/gif|GIF/", $file_type)) {
                $source_image = imagecreatefromgif($path1);
            }
            if ($source_image == FALSE) {
                $source_image = imagecreatefromjpeg($path1);
            }

            $orig_w = imageSX($source_image);
            $orig_h = imageSY($source_image);

            if ($orig_w < $new_w && $orig_h < $new_h) {
                $desired_width = $orig_w;
                $desired_height = $orig_h;
            } else {
                $scale = min($new_w / $orig_w, $new_h / $orig_h);
                $desired_width = ceil($scale * $orig_w);
                $desired_height = ceil($scale * $orig_h);
            }

            if ($squareSize != '') {
                $desired_width = $desired_height = $squareSize;
            }

            /* create a new, "virtual" image */
            $virtual_image = imagecreatetruecolor($desired_width, $desired_height);
            // for PNG background white----------->
            $kek = imagecolorallocate($virtual_image, 255, 255, 255);
            imagefill($virtual_image, 0, 0, $kek);

            if ($squareSize == '') {
                /* copy source image at a resized size */
                imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_height, $orig_w, $orig_h);
            } else {
                $wm = $orig_w / $squareSize;
                $hm = $orig_h / $squareSize;
                $h_height = $squareSize / 2;
                $w_height = $squareSize / 2;

                if ($orig_w > $orig_h) {
                    $adjusted_width = $orig_w / $hm;
                    $half_width = $adjusted_width / 2;
                    $int_width = $half_width - $w_height;
                    imagecopyresampled($virtual_image, $source_image, -$int_width, 0, 0, 0, $adjusted_width, $squareSize, $orig_w, $orig_h);
                }

                elseif (($orig_w <= $orig_h)) {
                    $adjusted_height = $orig_h / $wm;
                    $half_height = $adjusted_height / 2;
                    imagecopyresampled($virtual_image, $source_image, 0,0, 0, 0, $squareSize, $adjusted_height, $orig_w, $orig_h);
                } else {
                    imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $squareSize, $squareSize, $orig_w, $orig_h);
                }
            }

            if (@imagejpeg($virtual_image, $path2, 90)) {
                imagedestroy($virtual_image);
                imagedestroy($source_image);
                return TRUE;
            } else {
                return FALSE;
            }
        }
    }

}
