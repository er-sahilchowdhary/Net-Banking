<?php

function file_upload($file_info,$file_name) 
{

    // Get file/image name (with extension)
    $file_name_original =  $file_info['name'];

    // Extract file extension
    $extension = pathinfo($file_name_original, PATHINFO_EXTENSION);

    // Temp file location
    $file_temp_location =  $file_info['tmp_name'];

    // Get file size
    //$file_size =  $file_info['size'];

    // New file name using policy & file type
    $file_name_new = $file_name;
    $file_name_complete = $file_name_new . "." . $extension;

    // Make two file name variable to track while renaming if file already exists
    $file_name_original = $file_name_new;
    $num = 1;
    // Check if same file name already exists in upload folder, append increment number to original file name
    while (file_exists("img/" . $file_name_new . "." . $extension)) {
        $file_name_new = (string) $file_name_original . $num;
        $file_name_complete = $file_name_new . "." . $extension;
        $num++;
    }

    // Upload file in upload folder
    $file_target_location = "img/" . $file_name_complete;
    $file_upload_status = move_uploaded_file($file_temp_location, $file_target_location);

    if ($file_upload_status == true) {
        //echo "Congratulations. File has been uploaded to: $file_target_location";
        return $file_name_complete;
    } else {
        // echo "Error. File uploading failed! Check if 'upload' folder exists with proper permission and Try again.";
        // print_r(error_get_last());
        $error = 'true';
        return false;
    }
}

function clean_file_name($string)
{
    $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
    $string = preg_replace('/[^A-Za-z0-9\-]/', '-', $string); // Removes special chars.
    $string = strtolower($string); // Convert to lowercase

    return $string;
}

function get_party() 
{
	include('config.php');
	$result = mysqli_query($mysqli, "SELECT * FROM party");
	while($user_data = mysqli_fetch_array($result)) 
	{ ?>
		<option value="<?php echo $user_data['party_id']; ?>">
		<?php echo $user_data['party_name']; ?>
		</option>
	  <?php 
	} 
}

// Get user role by email
function get_party_name($party_id)
{
    include('config.php');
	$party_result = mysqli_query($mysqli, "SELECT * FROM party where party_id='$party_id'");
	while($user_data = mysqli_fetch_array($party_result)) 
	{ 
	return $user_data['party_name']; 
	} 
}

function get_candidate_party_name($candidate_id)
{
    include('config.php');
	$candidate_party_info=array();
	$candidate_party_result = mysqli_query($mysqli, "SELECT candidate.candidate_name,candidate.candidate_image,party.party_name,party.party_image FROM party INNER JOIN candidate ON party.party_id=candidate.party_id WHERE candidate_id='$candidate_id'");
	while($user_data = mysqli_fetch_array($candidate_party_result)) 
	{ 
		$candidate_party_info['candidate_name']=$user_data['candidate_name'];
		$candidate_party_info['party_name']=$user_data['party_name']; 
		$candidate_party_info['candidate_image']=$user_data['candidate_image'];
		$candidate_party_info['party_image']=$user_data['party_image']; 
	} 
	return $candidate_party_info;
}
?>