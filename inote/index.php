<?php 
require_once 'core/init.php';
require_once 'includes/header.php';

//layout
if ($user) {
	if (isset($_GET['ac'])) {
		$ac = addslashes(trim(htmlentities($_GET['ac'])));

		if ($ac == 'create_note') {
			require_once 'templates/create-note-form.php';
		}
		elseif ($ac == 'edit_note') {
			if (isset($_GET['id'])) {
				$get_id = addslashes(trim(htmlentities($_GET['id'])));
				if ($get_id != '') {
					$sql_check_id_exist = "SELECT id_note, user_id FROM notes WHERE user_id = '$data_user[id_user]' AND id_note = '$get_id'";
					if ($db->num_rows($sql_check_id_exist)) {
						require_once 'templates/edit-note-form.php';
					}
					else {
						echo '
						    <div class="container">
						    	<div class="alert alert-danger">
						    		Note này không tồn tại!
						    	</div>
						    </div>
						';
					}
				}
				else {
					header('Location: index.php');
				}
			}
			else {
				header('Location: index.php');
			}
		}
		elseif ($ac == 'change_password') {
			require_once 'templates/change-pass-form.php';
		}
	}
	else {
		require_once 'templates/list-note.php';
	}
}
else {
	require_once 'templates/signin-up-form.php';
}

require_once 'includes/footer.php';
 ?>