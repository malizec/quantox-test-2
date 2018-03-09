
<?php

require_once 'app/Libs/Database.php';
require_once 'app/Libs/Session.php';

Session::start();

if ( !Session::logged() ) {
    header('Location: /login');
}
?>

<?php view('header'); ?>
        <div class="container">
            <div class="row">

<?php
    if ( isset($_POST['search']) ) {
        $search = $_POST['search'];

        echo '<h1>You are searching for <i><strong>' . $search .'</strong></i></h1><hr>';

        ?>

            <?php

                 try {
                    $db = new Database();
                    $result = $db->query("SELECT * FROM `users` WHERE user_name LIKE '%".$search."%'");

                    if ( $result->num_rows  > 0 ) {
                        ?> <ul> <?php
                        while ($user = $result->fetch_assoc()){
                            echo '<li> User Name: '.$user['user_name'] . ' | User Email: ' . $user['user_email'] . '</li>';
                        }
                        ?> </ul> <?php
                    } else {
                        echo '<h2> There are no matching records </h2>';
                    }
                } catch (Exception $e) {

                }

            ?>
        <?php

    } else {
                 try {
                    $db = new Database();
                    $result = $db->query("SELECT * FROM `users`");

                    if ( $result->num_rows  > 0 ) {
                        ?> <ul> <?php
                        while ($user = $result->fetch_assoc()){
                            echo '<li> User Name: '.$user['user_name'] . ' | User Email: ' . $user['user_email'] . '</li>';
                        }
                        ?> </ul> <?php
                    } else {
                        echo '<h2> There are no matching records </h2>';
                    }
                } catch (Exception $e) {

                }
    }
?>
            </div>
        </div>


<?php view('footer'); ?>
