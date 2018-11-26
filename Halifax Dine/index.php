
<?php include('includes/header.php'); ?>

<div class="inner cover">
  <h1 class="cover-heading">Halifax Dine</h1>
    <p class="lead">Prime Ministers serving only eggs on the Halifax Waterfront. What more could you ask for?</p>
    <p class="lead">
      <!--<a href="menu.php" class="btn btn-lg btn-secondary">Menu</a>-->
      <div class="btn-group">
        <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Select Location
        </button>
        
        <div class="dropdown-menu">
          <?php
            $sql = "SELECT * FROM Restaurant";

            $result = mysqli_query($conn, $sql);

            while($row = mysqli_fetch_array($result)) {

              $RestID = $row['Rest_id'];
              $RestCity = $row['Rest_City'];
              $RestTaxRate = $row['Rest_TaxRate'];

              echo  "<a class=dropdown-item name=location method=post href=menu.php?RestID=$RestID>$RestCity</a>";
              echo  "<div class=dropdown-divider></div>";

            }

            mysqli_close($conn);

          ?>

        </div>
      </div>
    </p>
</div>

<?php include('includes/footer.php'); ?>
