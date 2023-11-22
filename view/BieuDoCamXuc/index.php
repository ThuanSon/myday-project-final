<?php
if (!isset($_SESSION['username']) || $_SESSION['login'] !== true) {
    // Nếu chưa đăng nhập, chuyển hướng đến trang đăng nhập
    header("Location: index.php?login");
}
?>
<div class="bieuDo">
<div class="DropdownMenu">
        <h3 >Biểu đồ cảm xúc </h3>
        <form class="form-select-mon" action="" method="post">
            <input type="text" name="bieuDoCamXuc" value='' hidden id="">
            <select name="thang" id="thang">
                <?php
                    include_once("Model/ketnoi.php");
                    $object = new conDB();
                    $connection = $object->connectDB($conn);
                    if ($connection) {
                        $queryCommand = 'SELECT DISTINCT month(thoigian) as thoigian FROM camxuc WHERE username = "'.$_SESSION['username'].'"';
          
                        $tbl = mysqli_query($conn, $queryCommand);
                        $result = mysqli_num_rows($tbl);
                        if($result>0){
                            while($row = mysqli_fetch_assoc($tbl)){
                                $thang = $row['thoigian'];
                                echo "<option value=$thang>$thang</option>";
                            }
                        }else{
                            echo "0 result";
                        }
                    }
                ?>
            </select>
            <input type="submit" name="btnfilter" value="filter">
        </form>
    </div>
    <?php
        $thang = $_REQUEST['thang'] ?? date('m');
        // var_dump($thang);
    ?>
    <div class="chart">
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load('visualization', '1.0', {'packages':['corechart']});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var ajax = new XMLHttpRequest();
        var method = "GET";
        var thang = <?php echo $thang?>;
        var link = "data.php?thang="+thang;
        var url = link;
      console.log(url);
        var asynchrous = true;
        ajax.open(method, url, asynchrous);

        ajax.send();

        ajax.onreadystatechange = function(){
            // (this.readyState==4 && this.status==200)?alert(this.responseText): alert("400");
            if (this.readyState==4 && this.status==200) {
              var response = JSON.parse(this.responseText);
              console.log(response);
              var data = new google.visualization.DataTable();
              data.addColumn('string', 'ThoiGian');
              data.addColumn('number', 'Cảm xúc');
              for (var i = 0; i < response.length; i++) {
                  if(response[i].TrangThai === 'Tệ'){
                    a = 1;
                  }
                  if(response[i].TrangThai === 'Buồn'){
                    a = 2;
                  }
                  if(response[i].TrangThai === 'Bình thường'){
                    a = 3;
                  }
                  if(response[i].TrangThai === 'Vui'){
                    a = 4;
                  }
                  if(response[i].TrangThai === 'Hạnh phúc'){
                    a = 5;
                  }
                  data.addRow([response[i].ThoiGian, a]);
                  
              };
              var options = {'title':'Chủ đề tháng',
                       'width':1000,
                       'height':600,
                        'color': 'green'};
              var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
              chart.draw(data, options);
            }
          }
      }
    </script>
    <div id="chart_div"></div>
    <div>
      <form action="#" method="post">
        <textarea placeholder="Tháng này của tôi ngập tràn" name="ghiChu" id="ghiChu" cols="100" rows="5"></textarea>
      </form>
    </div>
    </div>
</div>