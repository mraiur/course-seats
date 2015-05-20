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

echo htmlHeader(); ?>
    <div class="row col-md-12">
            <div class="col-md-6 <?=getDeskColor()?>">
        <!-- List of students -->
            <?php

            echo htmlDeskLabel(1);

            foreach($students as $student)
            {

                ?>
                <div class="col-md-6" style="text-align: center; padding: 15px;">
                    <img src="<?= $student->avatar ?>" class="img-circle"/>
                    <h3><?= $student->name ?></h3>
                </div>

                <?php
                if($cnt%2 === 0 && count($students) > $cnt){
                    echo '</div>';
                    echo '<div class="col-md-6 ' . getDeskColor() . '">';
                    echo htmlDeskLabel($cnt/2);
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