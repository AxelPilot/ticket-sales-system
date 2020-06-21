<?php

/**
 *
 */

class Login extends Controller {

    protected $url;
    protected $page_subtitle;
    protected $validation_exceptions;

    /**
     *
     */
    public function __construct($url = NULL) {
        $this->url = isset($_POST['url']) ? $_POST['url'] : ( isset($url) ? $url : "index.php" );
        parent::__construct();
    }

    /**
     *
     */
    protected function initial_action() {
        $this->set_page_subtitle('Sign In');
        $this->print_page_subtitle();
        new Login_Form($this->url, $this->validation_exceptions);
    }

    /**
     *
     */
    protected function submitted_action() {
        $this->set_page_subtitle('Sign In');
        $this->print_page_subtitle();

        // Save the user to the database.
        try {
            $user = new User(NULL, $_POST['email'], $_POST['password']);
            $admin_activation_code = $user->get_admin_activation_code();

            $_SESSION['user_ID'] = $user->get_user_ID();
            $_SESSION['firstname'] = $user->get_firstname();
            $_SESSION['lastname'] = $user->get_lastname();
            $_SESSION['admin'] = $user->is_admin() ? "Y" : ( isset($admin_activation_code) ? "applied" : "N" );

            redirect($this->url, false, NULL, 'loggedin=1');
            exit(); // Quit the script.
        } catch (AsDbErrorException $e) {
            ?>
            <div class="Error"><?php echo $e->getAsMessage(); ?></div>
            <p><div class="Error">Vennligst prøv igjen senere.</div></p>
            <?php
        } catch (AsDbException $e) {
            ?>
            <p><div class="Error"><?php echo $e->getAsMessage(); ?></div></p>
            <?php
        } catch (AsFormValidationException $e) {
            $this->validation_exceptions = $e->getAsMessage();
        }

        new Login_Form($this->url, $this->validation_exceptions);
    }

    /**
     *
     */
    protected function confirmed_action() {
        
    }

}
