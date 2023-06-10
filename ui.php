<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }
    
    .container {
      margin-top: 20px;
      margin-left: 80px;
    }

    #tabs {
      width: 100%;
    }

    .tab-content {
      padding: 10px;
    }

    form label {
      display: block;
      margin-top: 10px;
      font-weight: bold;
    }

    form input[type="text"],
    form select {
      width: 100%;
      padding: 5px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
    }

    form button {
      padding: 10px;
      background-color: #4CAF50;
      color: white;
      border: none;
      cursor: pointer;
    }

    #pelatihan {
      width: 100%;
      margin-top: 20px;
    }

    table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #ee1e1e;
            color: white;
        }
        h1{color: red;}
  </style>
</head>
<body>
  <div class="container">
    <div id="tabs">
      <ul>
        <li><a href="#datatableTab">Data Table</a></li>
        <li><a href="#formValidationTab">Form Validation</a></li>
        <li><a href="#updateTab">Update</a></li>
      </ul>
      <div id="datatableTab" class="tab-content">
      <h1 style="text-align: center;">Pelatihan TheCrafted.com</h1>
        <table id="pelatihan" class="display">
          <thead>
            <tr>
              <th>Nama Pelatihan</th>
              <th>Nama Peserta</th>
              <th>Tanggal Mulai</th>
              <th>Tanggal Selesai</th>
            </tr>
          </thead>
          <tbody>
          <?php
          require_once 'koneksi.php';
          $sql = "SELECT * FROM pelatihan";
          $result = mysqli_query($conn, $sql);
          ?>
          </tbody>
        </table>
      </div>
      <div id="formValidationTab" class="tab-content">
        <form id="addForm" method="post" action="proses_form.php">

          <label for="namapelatihan">Nama Pelatihan:</label>
          <input type="text" id="namapelatihan" name="namapelatihan" required>
          <label for="namapeserta">Nama Peserta:</label>
          <input type="text" id="namapeserta" name="namapeserta" required>

          <label for="tanggalmulai">Tanggal Mulai:</label>
          <input type="text" id="tanggalmulai" name="tanggalmulai" required>

          <label for="tanggalselesai">Tanggal Selesai:</label>
          <input type="text" id="tanggalselesai" name="tanggalselesai" required>
      </br>
      </br>
          <button type="submit">Submit</button>
        </form>
      </div>
      <div id="updateTab" class="tab-content">
        <form id="updateForm" method="post" action="proses_update.php">
          <label for="id">ID:</label>
          <input type="text" id="id" name="id" required>
          <label for="updatedNamapelatihan">Nama Pelatihan:</label>
          <input type="text" id="updatedNamapelatihan" name="namapelatihan" required>
          <label for="updatedNamapeserta">Nama Peserta:</label>
          <input type="text" id="updatedNamapeserta" name="namapeserta" required>
          <label for="updatedTanggalmulai">Tanggal Mulai:</label>
          <input type="text" id="updatedTanggalmulai" name="tanggalmulai" required>
          <label for="updatedTanggalselesai">Tanggal Selesai:</label>
          <input type="text" id="updatedTanggalselesai" name="tanggalselesai" required>
      </br>
      </br>
          <button type="submit">Update</button>
        </form>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>

  <script>
    $(document).ready(function() {
    $("#tabs").tabs();
    $("#pelatihan").DataTable();
    var table = $("#pelatihan").DataTable();

    $.ajax({
      url: "http://localhost/api_assement3/index.php",
      type: "GET",
      dataType: "json",
      success: function(data) {
        $.each(data, function(i, pelatihan) {
          var row = $("<tr>");
          $("<td>").text(pelatihan.namapelatihan).appendTo(row);
          $("<td>").text(pelatihan.namapeserta).appendTo(row);
          $("<td>").text(pelatihan.tanggalmulai).appendTo(row);
          $("<td>").text(pelatihan.tanggalselesai).appendTo(row);
          $("#pelatihan tbody").append(row);
        });
      }
    });

    $("#tanggalmulai, #tanggalselesai, #updatetanggalmulai, #updatetanggalselesai").datepicker({
      dateFormat: "yy-mm-dd"
    });
    
});
  </script>
</body>
</html>
