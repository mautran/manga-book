<?php 
	include 'inc/header.php';
?>
<?php 
	$login_check = Session::get('customer_login');
	if ($login_check) {
		header('Location:order.php'); 
	}
?>
<?php
    // gọi class category
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $insertCustomer = $cs -> insert_customer($_POST); // hàm check catName khi submit signin lên
    }
?>
<?php 
 	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $login_Customer = $cs -> login_customer($_POST); // hàm check catName khi submit login lên
    }
?>
<div class="main">
    <div class="content">
    	<div class="login_panel">
        	<h3>Đăng nhập</h3>
        	<p>Mời nhập thông tin</p>
        	<?php 
    		if (isset($login_Customer)) {
    			echo $login_Customer;
    		}
    		?>
        	<form action="" method="POST">
				<input type="text" name="email" class="field" placeholder="Nhập tài khoản hoặc email" >
				<input type="password" name="password" class="field" placeholder="Nhập mật khẩu" >				
				<div class="buttons"><div><input type="submit" name="login" class"grey" value="Đăng nhập" style="background: #ffffff;"></div></div>
            </form>
        </div>
    	<div class="register_account">
    		<h3>Đăng ký tài khoản</h3>
    		<?php 
    		if (isset($insertCustomer)) {
    			echo $insertCustomer;
    		}
    		 ?>
    		<form action="" method="POST">
		   		<table>
		   			<tbody>
						<tr>
							<td>
								<div>
									<input type="text" name="name" placeholder="Nhập tên">
								</div>							
								<div>
									<input type="text" name="company" placeholder="Nhập đơn vị công tác" >
								</div>								
								<div>
									<input type="text" name="zipcode" placeholder="Nhập Zipcode...">
								</div>
								<div>
									<input type="text" name="email" placeholder="Nhập E-Mail...">
								</div>
							</td>
		    				<td>
								<div>
									<select id="region" name="region" onchange="change_region(this.value)" class="frm-field required">
										<option value="bac">Miền Bắc</option>
										<option value="trung">Miền Trung</option>
										<option value="nam">Miền Nam</option>       
									</select>
								</div>	
								<div>
									<input type="text" name="address" placeholder="Nhập địa chỉ...">
								</div>	
								<div>
									<input type="text" name="phone" placeholder="Nhập số điện thoại...">
								</div>
								<div>
									<input type="password" name="password" placeholder="Nhập mật khẩu" style="width: 95%;height: 33px;margin-top: 7px;">
								</div>
							</td>
		    			</tr> 
		    		</tbody>
				</table> 
		    <div class="search"><div><input type="submit" name="submit" class"grey" value="Tạo tài khoản" style="background: #ffffff;	"></div></div>
		    <div class="clear"></div>
		    </form>
    	</div>  	
        <div class="clear"></div>
    </div>
</div>
<?php 
	include 'inc/footer.php';
?>
