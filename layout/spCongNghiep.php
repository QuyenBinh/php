<div class="module">
<div class="text-secondary-200 mb-5">
        <p>
          <strong class="heading-5">Sản Phẩm Công Nghiệp</strong>
        </p>
    </div>
    <div class = "row">
      <div class="field__content__item">
<?php  
    require_once './connect_mysql.php';
	$sql = "SELECT * FROM products p where p.type = 2 order by p.name asc limit 4";
	$result = mysqli_query($conn, $sql);
	while ($row = mysqli_fetch_assoc($result)) {
	?>
		<div class="col-xs-12 col-md-6 col-lg-3 field__content__items wow zoomIn" data-wow-duration="1s" style="flex: 0 0 22%;">
			<div class="field__item__thumb">
				<img src=<?php echo $row['image']?> alt="">
			</div>
			<p class = "style_name_prouct"><?php echo $row['name'] ?></p>
			<p style = "color: #0d2772"><?php echo $row['price']." VND" ?></p>
		</div>
	<?php } ?>
</div>
</div>
</div>