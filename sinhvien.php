<?php
require_once ('dbhelp.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/css/style.css">
    <link rel="stylesheet" href="assets/css/font/themify-icons/themify-icons.css">
    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <style>
        table{
            border: 2px solid #cccccc;
        }
        .th{
            border: 1px solid #ccc;
            width: 100px;
            
        }

        td{
            text-transform: uppercase;
            border: 1px solid #ccc;
            height: 75px;
            width: 125px;
        }
        
        #title {
            margin-left: 350px;
        }

        .form-control{
            width: 66%;
            margin-left: 130px;
        }


    </style>
</head>
<body>
    <div id="main">
        <div id="header">
            <!-- Begin -->
            <ul id="nav">
                <li><a href="index.php">Home</a></li>
                <li><a href="sinhvien.php">Student</a></li>
                <li><a href="">Information</a></li>
                <li><a href="">Contact</a></li>                
            </ul>

            <!-- End -->
            <!-- search -->
            <div class="search-btn">
                <i class="search-icon ti-search"></i>
            </div>
            <!-- End -->
            

        </div>

        <div id="slider">
            <div class="text">
                <h2 class="text-heading">Th??ng Tin Sinh Vi??n</h2>
                <!-- <p>Tr?????ng ?????i H???c Kinh Doanh V?? C??ng Ngh??? H?? N???i</p> -->
            </div>

            <div class="container">
                <div class="content">
                    <table class="sinhvien">
                        <thread>
                            <tr>
                                <th class="th"> STT</th>
                                <th class="th"> M?? Sinh Vi??n</th>
					    		<th class="th"> M?? Khoa</th>
					    		<th class="th"> H??? V?? T??n</th>
					    		<th class="th"> Gi???i T??nh</th>
					    		<th class="th"> N??m Sinh</th>
					    		<th class="th"> L???p</th>
                                <th width="60px"></th>
					    		<th width="60px"></th>
                            </tr>
                        </thread>
                        <tbody>
<?php
if (isset($_GET['s']) && $_GET['s'] != '') {
	$sql = 'select * from sinhvien where MA_SINHVIEN like "%'.$_GET['s'].'%"';
} else {
	$sql = 'select * from sinhvien';
}

$sinhvienList = executeResult($sql);

$index = 1;
foreach ($sinhvienList as $std) {
	echo '<tr>
            <td>'.($index++).'</td>
			<td>'.$std['MA_SINHVIEN'].'</td>
			<td>'.$std['MA_KHOA'].'</td>
			<td>'.$std['HOTEN'].'</td>
            <td>'.$std['GIOITINH'].'</td>
			<td>'.$std['NAMSINH'].'</td>
			<td>'.$std['MALOP'].'</td>
			<td><button class="btn btn-warning" onclick=\'window.open("input.php?id='.$std['id'].'","_self")\'>S???a</button></td>
			<td><button class="btn btn-danger" onclick="deletesinhvien('.$std['id'].')">X??a</button></td>
		</tr>';
}
?>
                        </tbody>
                    </table>
                    <button class="btn btn-success" onclick="window.open('input.php', '_self')">Th??m Sinh Vi??n</button>
                </div>
            </div>
    <script type="text/javascript">
		function deletesinhvien(id) {
			option = confirm('B???n c?? mu???n xo?? sinh vi??n n??y kh??ng')
			if(!option) {
				return;
			}

			console.log(id)
			$.post('delete_student.php', {
				'id': id
			}, function(data) {
				alert(data)
				location.reload()
			})
		}
	</script>

        </div>


        <div id="footer">
            <div class="a-icon">
                <a href="" class="icon-sheet">
                    
                    <i class="ti-check"></i>
                    ????? Ti???n Duy
                </a>
                <a href="https://www.facebook.com/imdui.t/" class="icon-sheet">
                    <i class="ti-facebook"></i>
                    Facebook
                    </a>
                <a href="https://www.instagram.com/_imdui.t/" class="icon-sheet">
                    <i class="ti-instagram"></i>
                    Instagram
                </a>

            </div>
        </div>

    </div>



</body>
</html>