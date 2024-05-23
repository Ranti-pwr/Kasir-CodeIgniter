<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add input data</title>
</head>
<body>
    <h2>Add Input data</h2>
    <?php echo validation_errors(); ?>

    <form action="<?php echo base_url('suara/SaveVote') ?>" method="post">
        <label>Nama TPS:</label>
        <input type="text" name="nama_tps"><br>
		
        <label>No 1:</label>
        <input type="text" name="no1"><br>

        <label>No 2:</label>
        <input type="text" name="no2"><br>

        <label>No 3:</label>
        <input type="text" name="no3"><br>

        <label>Total:</label>
        <input type="number" name="total"><br>

        <label>Total suara Sah:</label>
        <input type="number" name="total_sah"><br>

        <label>Total Tidak Sah:</label>
        <input type="number" name="total_tidaksah"><br>


        <button type="submit">Submit</button>
    </form>
</body>
</html>
