<?php
include("conf.php");
use DevCoder\DotEnv;

(new DotEnv(__DIR__ . '/.env'))->load();
$server = getenv('server');
$user = getenv('login');
$password = getenv('password');
$database = getenv('database');
$conn = new mysqli($server, $user, $password, $database);
$style = '<style>
th {
    background-color: #d8d8d8;
    padding:10px;
  }
td{
    padding:4px;
}
table, th, td {
    border: 1px solid #f1f1f1;
    border-collapse: collapse;
  }
.viewtable:hover {
    background-color: #f6f6f6;
    cursor: pointer;
}
.viewtable {
    background-color: #fff;
}
.viewtable1:hover {
    background-color: #f6f6f6;
    cursor: pointer;
}
.viewtable1 {
    background-color: #f0f0f0;
}
.searchbar{
    margin-top:50px;
    margin-bottom:50px;
    height:30px;
    padding:10px;
    outline:none;
    border: 1px solid #d8d8d8;
    border-radius:4px;
}
* {box-sizing: border-box}
body {font-family: "Lato", sans-serif;}
.tab {
  float: left;
  background-color: #f1f1f1;
  width: 30%;
  height: 300px;
}
.tab button {
  display: block;
  background-color: inherit;
  color: black;
  padding: 22px 16px;
  width: 100%;
  border: none;
  outline: none;
  text-align: left;
  cursor: pointer;
  transition: 0.3s;
  font-size: 17px;
}
.tab button:hover {
  background-color: #ddd;
}
.tab button.active {
  background-color: #ccc;
}

.tabcontent {
  float: left;
  padding: 0px 12px;
  width: 70%;
  border-left: none;
  height: 300px;
}
</style>';
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    $tableName = "userdata";
    $regtableName = "users";

///Registered Users Tab

    $sql = "SELECT * FROM `$regtableName`";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $datacontent = '';
        $i = 0;
        $color = '';
        $s = -1;
        while ($row = $result->fetch_assoc()) {
            $i++;
            
            $datacontent .= '<tr id="row_' . $row['id'] . '"';
            if ($color == '') {
                $color = $row["reg_date"];
            }
            if ($color !== $row["reg_date"]) {
                $color = $row["reg_date"];
                $s *= -1;
            }
            if ($s > 0)
                $datacontent .= 'class="viewtable1"';
            else
                $datacontent .= 'class="viewtable"';
            $datacontent .= '><td>' . $i . '</td>' . '<td>' . $row["firstName"].' '.$row["lastName"] . '</td>' . '<td>' . $row["email"] . '</td>' .'<td style="text-align: center;" onclick={alert("Developing!!!")}>' . "<img class=".'"w-8 h-8 mx-auto"'."  src='images/icons/reset-password.png' alt='download'></a>" . '</td>'. '<td style="text-align: center;" onclick={deleteRow(' . $row['id'] . ')}>' . "<img class=".'"mx-auto"'." src='images/icons/delete.png' alt='download'></a>" . '</td>' . '</tr>';
        }
    }
    $alluser='<input onchange={searchTable(this.value)} class="searchbar" type="text" placeholder="Search"/>
    <table style="margin:auto; margin-top:50px;" id="dataTable">
    <tr>
    <th>No</th>
    <th>Full Name</th>
    <th>Email</th>
    <th>Reset Password</th>
    <th>Delete</th>
    </tr>' . $datacontent . '</table>';

    $allusers='<div id="Users"  style="text-align: center;" class="tabcontent">'.$alluser.'</div>';

    $datacontent ='';
///Uploaded Data Tab

    $sql = "SELECT * FROM `$tableName`";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        $datacontent = '';
        $i = 0;
        $color = '';
        $s = -1;
        while ($row = $result->fetch_assoc()) {
            $i++;
            $tooltipText = "This is the tooltip text for row " . $i;

            $datacontent .= '<tr id="row_' . $row['id'] . '"';
            if ($color == '') {
                $color = $row["reg_date"];
            }
            if ($color !== $row["reg_date"]) {
                $color = $row["reg_date"];
                $s *= -1;
            }
            if ($s > 0)
                $datacontent .= 'class="viewtable1"';
            else
                $datacontent .= 'class="viewtable"';
            $datacontent .= 'title="Address:&nbsp;' . $row["uaddress"] . '&#10;Location:&nbsp;' . $row['position'] . ' &#10;Phone number:&nbsp;' . $row["phoneNumber"] . ' &#10;Upload date:&nbsp;' . $row["reg_date"] . '" ><td>' . $i . '</td>' . '<td>' . $row["fullName"] . '</td>' . '<td>' . $row["email"] . '</td>' . '<td>' . $row["umessage"] . '</td>' . '<td>' . $row["origin"] . '</td>' . '<td style="text-align: center;">' . "<a href='https://denturo.at/uploads/" . $row['filena'] . "' download><img  src='images/icons/download.png' alt='download'></a>" . '</td>' . '<td style="text-align: center;" onclick={deleteRow(' . $row['id'] . ')}>' . "<img  src='images/icons/delete.png' alt='download'></a>" . '</td>' . '</tr>';
        }
    }
    
    $userdata ='<div style="text-align: center;" id="Uploaded"  class="tabcontent">
    <input onchange={searchTable(this.value)} class="searchbar" type="text" placeholder="Search"/>
    <table style="margin:auto; margin-top:50px;" id="dataTable">
    <tr>
    <th>No</th>
    <th>Full Name</th>
    <th>Email</th>
    <th>Message</th>
    <th>File Name</th>
    <th>Download</th>
    <th>Delete</th>
    </tr>' . $datacontent . '</table></div>';
    $userdata .= '<script>
    function deleteRow(id) {
        if (confirm("Are you sure you want to delete this row?")) {
            // Make an AJAX request to delete the row from the database
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // Remove the row from the table if deletion was successful
                    if (this.responseText === "success") {
                        location.reload();
                        // var row = document.getElementById("row_" + id);
                        // row.parentNode.removeChild(row);
                    } else {
                        alert("Failed to delete the row");
                    }
                }
            };
            xhttp.open("GET", "delete_row.php?id=" + id+"&table=userdata", true);
            xhttp.send();
        }
    }
    function searchTable(val) {
        var input, filter, table, tr, td, i, txtValue;
        filter = val;
        table = document.getElementById("dataTable");
        tr = table.getElementsByTagName("tr");
        for (i = 1; i < tr.length; i++) {
            var displayRow = false;
            td = tr[i].getElementsByTagName("td");
            for (j = 1; j < td.length; j++) {
                txtValue = td[j].textContent || td[j].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    displayRow = true;
                    break;
                }
            }
            if (displayRow) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
    document.querySelector(".searchbar").addEventListener("input", function() {
        searchTable(this.value); // Call the searchTable function with the input value
    });
    </script>';




    $verticalTabs='<div class="tab">
        <button class="tablinks" onclick="openCity(event, '."'Users'".')" id="defaultOpen">Registered Users</button>
        <button class="tablinks" onclick="openCity(event, '."'Uploaded'".')">Uploaded Data</button>
    </div>';
    $tabscript='<script>function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
        }
        
        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen").click();</script>';
        $import='<script src="https://cdn.tailwindcss.com"></script>';
    $contents=$style.$import.'<div class="mt-20 mx-auto max-w-[1024px]"><div class="text-6xl font-bold">Admin Panel</div>'.$verticalTabs.$allusers.$userdata.'</div>'.$tabscript;
    echo $contents;
}

$conn->close();
?>