<!--Include header from another file-->
<?php include('inc/header.php'); ?>
<?php
include('DBConnection.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    /**
     * Calling the function in the user class
     **/
    $form->InsertEvaluation();

}
?>


<style>

</style>

<!--Include Navbar from another file-->
<?php include('inc/navbar.php') ?>

<section id="authors" class="">
    <div class="container-fluid">
        <div class="row">

            <!--Start Sidebar section-->
            <div class="col col-md-3 col-lg-3 text-center">
                <div class="card">
                    <div class="card-body">
                        <img src="<?php echo Session::get('photo'); ?>" alt=""
                             class="img-fluid rounded-circle w-50 mb-1">
                        <h4><?php echo Session::get('name'); ?></h4>
                        <h5 class="text-muted"><?php echo Session::get('role'); ?></h5>
                        <div class="list-group">
                            <a href="index.php" class="list-group-item list-group-item-action">Home</a>
                            <a href="register_supervisor.php" class="list-group-item list-group-item-action"
                               style="<?php if (Session::get('role') != "CMP") {
                                   echo "display:none";
                               } ?>">Register Supervisor</a>
                            <a href="student_list.php" class="list-group-item list-group-item-action"
                               style="<?php if (Session::get('role') != "CMP") {
                                   echo "display:none";
                               } ?>">Allocate Supervisor</a>
                            <a href="form1Student.php" class="list-group-item list-group-item-action"
                               style="<?php if (Session::get('role') != "STD") {
                                   echo "display:none";
                               } ?>">Form I-1</a>
                            <a href="form1SupervisorRList.php" class="list-group-item list-group-item-action"
                               style="<?php if (Session::get('role') != "SUP") {
                                   echo "display:none";
                               } ?>">Form I-1
                                <?php
                                include('DBConnection.php');
                                $supId = Session::get('uid');
                                $sql = "SELECT * FROM form1_student_details WHERE supervisor='$supId' AND sup_response='in progress'";
                                $result = mysqli_query($con, $sql);
                                $count = mysqli_num_rows($result);
                                echo '<span class="badge badge-success ml-3"><b>' . $count . '</b></span>';
                                ?>
                            </a>
                            <a href="form-i-3.php" class="list-group-item list-group-item-action"
                               style="<?php if (Session::get('role') != "STD") {
                                   echo "display:none";
                               } ?>">Form I-3</a>
                            <a href="form5.php" class="list-group-item list-group-item-action active"
                               style="<?php if (Session::get('role') != "SUP") {
                                   echo "display:none";
                               } ?>">Form I-5</a>
                            <a href="form_I-7.php" class="list-group-item list-group-item-action"
                               style="<?php if (Session::get('role') != "ADM") {
                                   echo "display:none";
                               } ?>">Form I-7</a>
                            <a href="getPerformances.php" class="list-group-item list-group-item-action"
                               style="<?php if (Session::get('role') != "ADM") {
                                   echo "display:none";
                               } ?>">Performance</a>
                            <a href="form-i-3-supervisor.php" class="list-group-item list-group-item-action"
                               style="<?php if (Session::get('role') != "STD") {
                                   echo "display:none";
                               } ?>">Certify And Email Form I-3</a>
                            <a href="grade.php" class="list-group-item list-group-item-action"
                               style="<?php if (Session::get('role') != "ADM") {
                                   echo "display:none";
                               } ?>">Grading-From</a>
                            <a href="marking_summary.php" class="list-group-item list-group-item-action"
                               style="<?php if (Session::get('role') != "ADM") {
                                   echo "display:none";
                               } ?>">Marking-Summary-From</a>
                            <a href="Schedule.php" class="list-group-item list-group-item-action"
                               style="<?php if (Session::get('role') != "ADM") {
                                   echo "display:none";
                               } ?>">Schedule</a>
                            <a href="schedule_report.php" class="list-group-item list-group-item-action"
                               style="<?php if (Session::get('role') != "ADM") {
                                   echo "display:none";
                               } ?>">Schedule Report</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Sidebar Section-->

            <!--Start Main section-->
            <div class="col col-md-9 col-lg-9">
                <div class="jumbotron jumbotron-fluid text-center welcome">
                    <div class="container">
                        <h1 class="display-5">Final Evaluation of the Internship Student</h1>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">


                        <?php
                        if (isset($InsertEvaluation)) {

                            echo $InsertEvaluation;
                        }
                        ?>

                        <form action="form5.php" method="post">

                            <fieldset>
                                <div class="form-group">
                                    <label for="EngineCap" class="col-sm-3 control-label">Student ID</label>
                                    <div class="col-sm-4">
                                        <input type="text" id="search" placeholder="Enter Student ID"
                                               class="form-control" name="search">
                                    </div>
                                </div>

                                <div id="here"></div>


                                <div class='form-group'>
                                    <label><b>Describe the differences if any, between student's initial contract and
                                            actual assignment which developed</b></label>
                                    <textarea class='form-control' name='area1'></textarea><br>

                                </div>


                                <div class="jumbotron">

                                    <h4><b> Performance of the student</b></h4>

                                    <table style="width:100%" id="data" class="table-striped">
                                        <tr>
                                            <th>Category</th>
                                            <th>Above Average</th>
                                            <th>Average</th>
                                            <th>Below Average</th>
                                            <th>Comments,Examples</th>

                                        </tr>

                                        <tr>
                                            <td>Volume of work</td>
                                            <td><input type="radio" name="volume" value="aboveavg"></td>
                                            <td><input type="radio" name="volume" value="average"></td>
                                            <td><input type="radio" name="volume" value="belowavg"></td>
                                            <td><textarea class='form-control' name='volume' cols="20"
                                                          rows="1"></textarea></td>

                                        </tr>

                                        <tr>
                                            <td>Quality of work</td>
                                            <td><input type="radio" name="quality" value="aboveavg"></td>
                                            <td><input type="radio" name="quality" value="average"></td>
                                            <td><input type="radio" name="quality" value="belowavg"></td>
                                            <td><textarea class='form-control' name='quality' cols="20"
                                                          rows="1"></textarea></td>

                                        </tr>

                                        <tr>
                                            <td>Analytical ability</td>
                                            <td><input type="radio" name="analytic" value="aboveavg"></td>
                                            <td><input type="radio" name="analytic" value="average"></td>
                                            <td><input type="radio" name="analytic" value="belowavg"></td>
                                            <td><textarea class='form-control' name='analytic' cols="20"
                                                          rows="1"></textarea></td>

                                        </tr>

                                        <tr>
                                            <td>Ability to resolve problems</td>
                                            <td><input type="radio" name="resolve" value="aboveavg"></td>
                                            <td><input type="radio" name="resolve" value="average"></td>
                                            <td><input type="radio" name="resolve" value="belowavg"></td>
                                            <td><textarea class='form-control' name='analytic' cols="20"
                                                          rows="1"></textarea></td>

                                        </tr>

                                        <tr>
                                            <td>Ability to resolve problems</td>
                                            <td><input type="radio" name="resolve" value="aboveavg"></td>
                                            <td><input type="radio" name="resolve" value="average"></td>
                                            <td><input type="radio" name="resolve" value="belowavg"></td>
                                            <td><textarea class='form-control' name='analytic' cols="20"
                                                          rows="1"></textarea></td>

                                        </tr>

                                        <tr>
                                            <td>Accuracy and thoroughness</td>
                                            <td><input type="radio" name="Accuracy" value="aboveavg"></td>
                                            <td><input type="radio" name="Accuracy" value="average"></td>
                                            <td><input type="radio" name="Accuracy" value="belowavg"></td>
                                            <td><textarea class='form-control' name='analytic' cols="20"
                                                          rows="1"></textarea></td>

                                        </tr>

                                        <tr>
                                            <td>Ability to work under pressure</td>
                                            <td><input type="radio" name="pressure" value="aboveavg"></td>
                                            <td><input type="radio" name="pressure" value="average"></td>
                                            <td><input type="radio" name="pressure" value="belowavg"></td>
                                            <td><textarea class='form-control' name='pressure' cols="20"
                                                          rows="1"></textarea></td>

                                        </tr>

                                        <tr>
                                            <td>Oral communication</td>
                                            <td><input type="radio" name="oral" value="aboveavg"></td>
                                            <td><input type="radio" name="oral" value="average"></td>
                                            <td><input type="radio" name="oral" value="belowavg"></td>
                                            <td><textarea class='form-control' name='oral' cols="20"
                                                          rows="1"></textarea></td>

                                        </tr>

                                        <tr>
                                            <td>Written communication</td>
                                            <td><input type="radio" name="written" value="aboveavg"></td>
                                            <td><input type="radio" name="written" value="average"></td>
                                            <td><input type="radio" name="written" value="belowavg"></td>
                                            <td><textarea class='form-control' name='written' cols="20"
                                                          rows="1"></textarea></td>

                                        </tr>

                                        <tr>
                                            <td>Oral and critical thinking</td>
                                            <td><input type="radio" name="think" value="aboveavg"></td>
                                            <td><input type="radio" name="think" value="average"></td>
                                            <td><input type="radio" name="think" value="belowavg"></td>
                                            <td><textarea class='form-control' name='think' cols="20"
                                                          rows="1"></textarea></td>

                                        </tr>

                                        <tr>
                                            <td>Ability to learn</td>
                                            <td><input type="radio" name="learn" value="aboveavg"></td>
                                            <td><input type="radio" name="learn" value="average"></td>
                                            <td><input type="radio" name="learn" value="belowavg"></td>
                                            <td><textarea class='form-control' name='learn' cols="20"
                                                          rows="1"></textarea></td>

                                        </tr>


                                    </table>
                                    <br><br>
                                </div>

                                <div class="jumbotron">

                                    <h4><b> Work Habbit of Student</b></h4>

                                    <table style="width:100%" id="data" class="table-striped">
                                        <tr>
                                            <th>Category</th>
                                            <th>Above Average</th>
                                            <th>Average</th>
                                            <th>Below Average</th>
                                            <th>Comments,Examples</th>

                                        </tr>

                                        <tr>
                                            <td>Effective in organizing work</td>
                                            <td><input type="radio" name="organizing" value="aboveavg"></td>
                                            <td><input type="radio" name="organizing" value="average"></td>
                                            <td><input type="radio" name="organizing" value="belowavg"></td>
                                            <td><textarea class='form-control' name='organizing' cols="20"
                                                          rows="1"></textarea></td>

                                        </tr>

                                        <tr>
                                            <td>Takes the initiative</td>
                                            <td><input type="radio" name="initiative" value="aboveavg"></td>
                                            <td><input type="radio" name="initiative" value="average"></td>
                                            <td><input type="radio" name="initiative" value="belowavg"></td>
                                            <td><textarea class='form-control' name='initiative' cols="20"
                                                          rows="1"></textarea></td>

                                        </tr>

                                        <tr>
                                            <td>Flexible to non-routine work</td>
                                            <td><input type="radio" name="non-routine" value="aboveavg"></td>
                                            <td><input type="radio" name="non-routine" value="average"></td>
                                            <td><input type="radio" name="non-routine" value="belowavg"></td>
                                            <td><textarea class='form-control' name='"non-routine' cols="20"
                                                          rows="1"></textarea></td>

                                        </tr>

                                        <tr>
                                            <td>Active and alert</td>
                                            <td><input type="radio" name="Active" value="aboveavg"></td>
                                            <td><input type="radio" name="Active" value="average"></td>
                                            <td><input type="radio" name="Active" value="belowavg"></td>
                                            <td><textarea class='form-control' name='Active' cols="20"
                                                          rows="1"></textarea></td>

                                        </tr>

                                        <tr>
                                            <td>Attitude toward organization</td>
                                            <td><input type="radio" name="Attitude" value="aboveavg"></td>
                                            <td><input type="radio" name="Attitude" value="average"></td>
                                            <td><input type="radio" name="Attitude" value="belowavg"></td>
                                            <td><textarea class='form-control' name='Attitude' cols="20"
                                                          rows="1"></textarea></td>

                                        </tr>

                                        <tr>
                                            <td>Team player</td>
                                            <td><input type="radio" name="player" value="aboveavg"></td>
                                            <td><input type="radio" name="player" value="average"></td>
                                            <td><input type="radio" name="player" value="belowavg"></td>
                                            <td><textarea class='form-control' name='player' cols="20"
                                                          rows="1"></textarea></td>

                                        </tr>

                                        <tr>
                                            <td>Diligence and perseverance</td>
                                            <td><input type="radio" name="Diligence" value="aboveavg"></td>
                                            <td><input type="radio" name="Diligence" value="average"></td>
                                            <td><input type="radio" name="Diligence" value="belowavg"></td>
                                            <td><textarea class='form-control' name='Diligence' cols="20"
                                                          rows="1"></textarea></td>

                                        </tr>

                                        <tr>
                                            <td>Accepts responsibility</td>
                                            <td><input type="radio" name="responsibility" value="aboveavg"></td>
                                            <td><input type="radio" name="responsibility" value="average"></td>
                                            <td><input type="radio" name="responsibility" value="belowavg"></td>
                                            <td><textarea class='form-control' name='responsibility' cols="20"
                                                          rows="1"></textarea></td>

                                        </tr>


                                    </table>
                                    <br><br>
                                </div>

                                <div class='form-group'>
                                    <label><b>List positive personal characteristics (Business Acumen, Vigor,
                                            Adaptability, Teamwork, Leadership, Confidence, etc.)</b></label>
                                    <textarea class='form-control' name='area2'></textarea><br>

                                </div>

                                <div class='form-group'>
                                    <label><b>List personal characteristics that will help the student in his/her
                                            professional development</b></label>
                                    <textarea class='form-control' name='area3'></textarea><br>

                                </div>

                                <div class='form-group'>
                                    <label><b>How effective has the Internship Program been in meeting the needs of your
                                            organization?</b></label>
                                    <textarea class='form-control' name='area4'></textarea><br>

                                </div>

                                <div class='form-group'>
                                    <label><b>Please suggest ways you feel we could make our program more meaningful to
                                            the student and you, the employer.</b></label>
                                    <textarea class='form-control' name='area5'></textarea><br>

                                </div>

                                <div class='form-group'>
                                    <label><b>Please comment on the appropriateness of the student's academic training
                                            as it related to a position in your organization.</b></label>
                                    <textarea class='form-control' name='area6'></textarea><br>

                                </div>


                                <div class='form-group'>
                                    <label><b>Any other comments about the student or on the Faculty
                                            Advisor:.</b></label>
                                    <textarea class='form-control' name='area7'></textarea><br>

                                </div>


                                <div class='form-group'>
                                    <label><b>Overrall Student performance </b></label><br>
                                    <input type="radio" name="performance " value=" Outstanding"> Outstanding<br>
                                    <input type="radio" name="performance" value="Very Good"> Very Good<br>
                                    <input type="radio" name="performance " value=" good"> good<br>
                                    <input type="radio" name="performance" value="Marginal"> Marginal<br>
                                    <input type="radio" name="performance" value="Unsatisfactory"> Unsatisfactory<br>

                                </div>

                                <div class='form-group'>
                                    <label><b>External supervisor name</b></label>
                                    <input class='form-control' name='name' placeholder='Enter external supervisor name'
                                           type='text'>
                                </div>

                                <div class='form-group'>
                                    <label><b>Date</b></label>
                                    <input class='form-control' name='date' type="date">
                                </div>


                                <button type='submit' class='btn btn-primary' name='submit'>Send the Email</button>
                            </fieldset>
                        </form>

                    </div>


                </div>
                <!--End main section-->

            </div>
        </div>
</section>


<!--Include Footer from another file-->
<?php include('inc/footer.php') ?>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function (e) {
        $("#search").keyup(function () {
            $("#here").show();
            var x = $(this).val();
            $.ajax({
                type: 'GET',
                url: 'fetch.php',
                data: 'q=' + x,
                success: function (data) {
                    $("#here").html(data);
                }
            });
        });

    });

</script>

<!--Include Footer from another file-->
<?php include('inc/footer.php') ?>