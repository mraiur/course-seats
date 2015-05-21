<?php

define("ROOT", dirname(__FILE__)."/");

require_once ROOT . "include/main.php";


$studentsList = getStudentList();
$studentsInClass = getInClassList();
$students = [];

foreach($studentsList as $row){
    if(in_array($row->id, $studentsInClass)){
        array_push($students, $row);
    }
}

shuffle($students);
$cnt = 1;
$desk = 1;

echo htmlHeader(); ?>
    <div class="row col-md-12">
            <div class="col-md-6 <?=getDeskColor()?>">
        <!-- List of students -->
            <?php

            echo htmlDeskLabel($desk);

            foreach($students as $student)
            {

                ?>
                <div class="col-md-6" style="text-align: center; padding: 15px;">
                    <img width="50" src="<?= $student->avatar ?>" class="img-circle"/>
                    <h3><?= $student->name ?></h3>
                </div>

                <?php
                if($cnt%2 === 0 && count($students) > $cnt){
                    echo '</div>';
                    if( $desk % 2 == 0){
                        echo '<div class="clear"></div>';
                    }
                    echo '<div class="col-md-6 ' . getDeskColor() . '">';

                    $desk++;

                    echo htmlDeskLabel($desk); // because we already have a desk
                    //echo '<div class="label label-default">Desk ' . ($cnt / 2) . '</div>';
                }
                $cnt++;
            }
            ?>
            </div>
        <!-- END list of students -->

        </div>
    </div>

<?php
echo htmlFooter();
?>