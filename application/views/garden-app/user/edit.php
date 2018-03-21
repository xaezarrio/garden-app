   <input type="hidden" name="ids" value="<?= $data['id'] ?>">
   <table class="table table-borderd table-striped">
		<tr>
			<td>Name</td>
			<td><input name="dt[name]" type="text" class="form-control" value="<?= $data['name'] ?>" required="" /></td>
		</tr>
		<tr>
			<td>Username</td>
			<td><input name="dt[username]" type="text" class="form-control" value="<?= $data['username'] ?>" required="" /></td>
		</tr>
		
		<tr>
			<td>Email</td>
			<td><input name="dt[email]" type="text" class="form-control" value="<?= $data['email'] ?>" required="" /></td>
		</tr>
		
		<tr>
			<td>Password</td>
			<td><input name="password" type="password" class="form-control" value="" placeholder="xxxxxxx" /></td>
		</tr>
		<tr>
			<td>Site</td>
			<td>
				<select class="form-control" name="dt[role_id]">
					<?php 
					$user = $this->mymodel->selectData('role');
					foreach ($user as $role) {
					?>
					<option value="<?= $role['id'] ?>" <?php if($data['role_id']==$role['id']){ echo "selected=''"; } ?>><?= $role['role'] ?></option>
					<?php } ?>
				</select>
			</td>
		</tr>
		
	</table>	