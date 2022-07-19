<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <?php include('./includes/header.inc');
  $page = "about"; ?>
</head>

<body>
  <section class="colored-section" id="title">
    <!-- Nav Bar -->
    <header>
      <?php include('./includes/nav.inc') ?>
    </header>
  </section>

  <section class="white-section">
    <div class="row">
      <div class="col-lg-6">
        <!--Bootstrap column class-->
        <dl>
          <dt>Name </dt>
          <dd>Adnan Zafar</dd>
          <dt>Student ID </dt>
          <dd>s103169535</dd>
          <dt>Course </dt>
          <dd>Bachelor of Computer Science (BA-CS)</dd>
          <dt>E-Mail </dt>
          <dd>103169535@student.swin.edu.au</dd>
        </dl>
      </div>

      <div class="col-lg-6">
        <!--Bootstrap column class-->
        <figure>
          <img class="mypic" src="images/me.png" alt="">
        </figure>
      </div>
    </div>

    <h1>Student Timetable</h1>
    <table id="tt">
      <!--Student Timetable-->
      <thead>
        <tr>
          <th>Time/Day</th>
          <th>Monday</th>
          <th>Tuesday</th>
          <th>Wednesday</th>
          <th>Thursday</th>
          <th>Friday</th>
          <th>Saturday</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="rowhead"><strong>8:30</strong></td>
          <!--changing background class-->
          <td></td>
          <td></td>
          <td></td>
          <td class="tne" rowspan="3"><strong>TNE10005</strong><br>Practical-1<br>Hawthorn ONLINE</td>
          <!--changing background class-->
          <td></td>
          <td></td>
        </tr>

        <tr>
          <td class="rowhead"><strong>10:00</strong></td>
          <!--changing background class-->
          <td></td>
          <td rowspan="3" class="prog"><strong>COS10009</strong><br>Live Online 1<br>Hawthorn ONLINE</td>
          <!--changing background class-->
          <td></td>
          <td></td>
          <td></td>
        </tr>

        <tr>
          <td class="rowhead"><strong>11:30</strong></td>
          <!--changing background class-->
          <td class="web" rowspan="5"><strong>COS10011</strong><br>Live Online(1)<br>Hawthorn ONLINE</td>
          <!--changing background class-->
          <td></td>
          <td></td>
          <td></td>
        </tr>

        <tr>
          <td class="rowhead"><strong>12:00</strong></td>
          <!--changing background class-->
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>

        <tr>
          <td class="rowhead"><strong>12:30</strong></td>
          <!--changing background class-->
          <td></td>
          <td></td>
          <td class="prog" rowspan="4"><strong>COS10009</strong><br>Workshop 2<br>Hawthorn ONLINE</td>
          <!--changing background class-->
          <td></td>
          <td></td>
        </tr>

        <tr>
          <td class="rowhead"><strong>13:00</strong></td>
          <!--changing background class-->
          <td></td>
          <td class="cle" rowspan="3"><strong>COS10003</strong><br>Live Online 1<br>Hawthorn ONLINE</td>
          <!--changing background class-->
          <td></td>
          <td></td>
        </tr>

        <tr>
          <td class="rowhead"><strong>13:30</strong></td>
          <!--changing background class-->
          <td></td>
          <td></td>
          <td></td>
        </tr>

        <tr>
          <td class="rowhead"><strong>14:30</strong></td>
          <!--changing background class-->
          <td></td>
          <td class="cle" rowspan="3"><strong>COS10003</strong><br>Tutorial 1 <br>Hawthorn ONLINE </td>
          <!--changing background class-->
          <td></td>
          <td></td>
        </tr>

        <tr>
          <td class="rowhead"><strong>15:00</strong></td>
          <!--changing background class-->
          <td></td>
          <td></td>
          <td class="prog" rowspan="3"><strong>COS10009</strong><br>Workshop 1 <br>Hawthorn EN101 </td>
          <!--changing background class-->
          <td></td>
          <td></td>
        </tr>

        <tr>
          <td class="rowhead"><strong>15:30</strong></td>
          <!--changing background class-->
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>

        <tr>
          <td class="rowhead"><strong>16:30</strong></td>
          <!--changing background class-->
          <td class="web" rowspan="2"><strong>COS10011</strong><br>Lab 1(11)<br>Hawthorn Online </td>
          <!--changing background class-->
          <td class="prog" rowspan="3"><strong>COS10009</strong><br>Lab 1<br>Hawthorn ONLINE<br>&<br>Lab 2<br>Hawthorn ATC625</td>
          <!--changing background class-->
          <td></td>
          <td></td>
          <td></td>
        </tr>

        <tr>
          <td class="rowhead"><strong>17:30</strong></td>
          <!--changing background class-->
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>

        <tr>
          <td class="rowhead"><strong>18:30</strong></td>
          <!--changing background class-->
          <td></td>
          <td></td>
          <td class="tne" rowspan="3"><strong>TNE10005</strong><br>Live Online 1<br>Hawthorn ONLINE </td>
          <!--changing background class-->
          <td></td>
          <td></td>
        </tr>

        <tr>
          <td class="rowhead"><strong>19:30</strong></td>
          <!--changing background class-->
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>

        <tr>
          <td class="rowhead"><strong>20:00</strong></td>
          <!--changing background class-->
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
      </tbody>
    </table>
  </section>

  <footer class="colored-section" id="footer">
    <?php include('./includes/footer.inc') ?>
  </footer>

</body>

</html>
