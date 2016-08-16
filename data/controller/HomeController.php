<?php
require_once (CONTROLLER_DIR . 'BaseController.php');//su dung lop basaController
require_once (MODEL_DIR . 'MovieModel.php');//su dung lop Movie
require_once (MODEL_DIR . 'ContactModel.php');//su dung lop ContacModel 
require_once (MODEL_DIR . 'NewsletterModel.php');//su dung lop NewsletterModel
/**
* 
*/
class HomeController extends BaseController//tao class HomeController ke thua lop Base
{
    private $view_prefix = '';

    function __construct()//tao ham xay dung
    {
        parent::__construct();//lop con ke thua lop cha
    }

    public function index() // action cua trang index (trang chu)
    {
        $model = new MovieModel(); // khoi tao movie model

        $arrRet['arrMovie'] = $model->getMovie('showing', 8, 'mc.start_date'); //lay phim dang chieu
        $arrRet['arrUpcoming'] = $model->getMovie('upcoming', 4, 'mc.start_date'); //lay phim sap chieu

        $arrError = array(); // array loi
        // get init param
        $reflector = new ReflectionClass('ContactModel'); //lay thong tin cua class
        $arrForm = $reflector->getDefaultProperties(); // lay attributes cua class

        if (!empty($_POST['contact'])) { //Kiem tra co nhan nut contact hay khong?
            $Contact = new ContactModel(); //khoi tao contact model
            // thông tin liên lạc
            $arrContact = $_POST['contact']; //lay du lieu tu phuong thuc post 
            $Contact->setParam($arrContact); // save du lieu nguoi nhap vao object contact
            // kiểm tra lỗi
            $Contact->checkError();
            $arrError = $Contact->arrError;

            if (count($arrError) == 0) { // khong co loi
                if ($Contact->contactMail()) {//thi se chạy ham gui mail
                    echo '<script type="text/javascript">alert("Cảm ơn những ý kiến đóng góp của bạn");
                    window.location.href="'.HTTP_HOST.'";</script>';
                }
            } else {//nguoc lai 
                // return value to view when error
                // $arrErrorVal = $Contact->getArray($arrForm);
                // $arrForm = array_merge($arrForm, $arrErrorVal);
                //xuat ra lỗi
                echo '<script type="text/javascript">alert("'.array_pop($arrError).'");
                    window.location.href="'.HTTP_HOST.'#section-contact";</script>';
                echo '<script type="text/javascript">document.getElementById("section-contact").scrollIntoView()</script>';
            }
        }

        if (!empty($_POST['news'])) {
            $Newsletter = new NewsletterModel();
            // thông tin liên lạc
            $arrNewsletter = $_POST['news'];
            $Newsletter->setParam($arrNewsletter);
            // kiểm tra lỗi
            $Newsletter->checkError();
            $arrError = $Newsletter->arrError;

            if (count($arrError) == 0) {
                $arrVal['email'] = $Newsletter->getValue('email');
                if ($Newsletter->register($arrVal)) {
                    $Newsletter->sendNewsletterAlert();
                    echo '<script type="text/javascript">alert("Bảng tin đã được đăng ký thành công!");
                    window.location.href="'.HTTP_HOST.'";</script>';
                }
            } else {
                // return value to view when error
                echo '<script type="text/javascript">alert("'.array_pop($arrError).'");
                    window.location.href="'.HTTP_HOST.'#section-subscribe";</script>';
                echo '<script type="text/javascript">document.getElementById("section-subscribe").scrollIntoView()</script>';
            }
        }

        $arrRet['arrForm'] = $arrForm;
        $arrRet['arrError'] = $arrError;

        $this->loadView($this->view_prefix . $this->mode, $arrRet);
    }

    public function news()
    {
        $Newsletter = new NewsletterModel();
        $newsId = Common::xssafe($_GET['nlt']);
        if (!empty($newsId) && $Newsletter->existCheck($newsId)) {
            $data = $Newsletter->getEmail($newsId);
            if ($Newsletter->disable($newsId)) {
                $Newsletter->setValue('email', $data['email']);
                $Newsletter->sendNewsletterDelete();
                echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
                    <script type="text/javascript">alert("Bảng tin của bạn đã được xóa thành công!");
                    window.location.href="'.HTTP_HOST.'";</script>';
                return true;
                exit;
            }
        }

        echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
            <script type="text/javascript">alert("Bảng tin hủy thất bại, vui lòng thao tác lại!");
            window.location.href="'.HTTP_HOST.'";</script>';
        return false;
    }
}