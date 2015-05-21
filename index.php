<?php

define("ROOT", dirname(__FILE__)."/");

require_once ROOT . "include/main.php";

//$_SESSION['inClass'] = array();


if(isset($_POST['type']) && intval($_POST['id']) > 0){

    $id = intval($_POST['id']);

    if($_POST['type'] == 'add' ){
        addInClass( $id );
    } else if( $_POST['type'] == 'remove' ) {
        removeFromClass( $id );
    }
}

$students = getStudentList();

echo htmlHeader(); ?>
    <div class="row">

        <!-- List of students -->
        <div class="col-md-6 list-group">
            <a href="#" class="list-group-item disabled">
                Students
            </a>
            <?php
            $notInClass = 0;
            foreach($students as $student)
            {
                if(!isStudentInClass($student->id) ) {
                    ?>
                    <div class="list-group-item">
                        <form action="" method="post">
                            <input type="hidden" name="type" value="add" />
                            <input type="hidden" name="id" value="<?= $student->id ?>" />
                            <img width="50" src="<?= $student->avatar ?>" class="img-circle"/>
                            <?= $student->name ?>
                            <button class="btn btn-primary pull-right" type="submit">In class</button>
                        </form>
                    </div>

                <?php
                    $notInClass++;
                }
            }

            if($notInClass === 0){ ?>
            <div class="alert alert-success" >
                All students are in class!
            </div>
            <?php
            }
            ?>

        </div>
        <!-- END list of students -->


        <!-- List of students in class -->
        <div class="col-md-6 list-group">
            <a href="#" class="list-group-item disabled">
                In Class
            </a>

            <?php
            $inClass = 0;
            foreach($students as $student)
            {
                if(isStudentInClass($student->id) ) {
                    ?>
                    <div class="list-group-item">
                        <form action="" method="post">
                            <input type="hidden" name="type" value="remove" />
                            <input type="hidden" name="id" value="<?= $student->id ?>" />
                            <img width="50" src="<?= $student->avatar ?>" class="img-circle"/>
                            <?= $student->name ?>
                            <button class="btn btn-primary pull-right" type="submit">not in class</button>
                        </form>
                    </div>

                <?php
                    $inClass++;
                }
            }

            if($inClass === 0){ ?>
                <div class="alert alert-success" >
                    No students in class.
                </div>
            <?php
            }
            ?>

        </div>
    </div>

<?php
echo htmlFooter();
?>