<div class="module">
            <h2 class="heading-2 text-primary-500 font-bold mb-lg-10 mb-6 text-header-color">Sản phẩm mới</h2>
    </div>
    <div class="home-cate-wrap">
    <div class="container" style="max-width: 100%;">
      <div class = "row">
      <div class="field__content__item">
<?php  
    require_once './connect_mysql.php';
	$sql = "SELECT * FROM products p where p.type = 4 order by p.name asc limit 4";
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
</div>