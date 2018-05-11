<?php require_once SERVER_ROOT."\\lib\\data_access_helper.php" ?>
<?php
	function insertSearchDataInDb($user,$entities){
		$counter = 1;
		$total = sizeof($entities);
        $query = "INSERT INTO  tbl_search VALUES(null,".$user['uid'].",";
        foreach ($entities as $entity) {
        	if ($entity == null) {
        		$entity = "null";
        	}
        	$query = $query.$entity;
        	if ($counter < $total) {
        		$query = $query. ",";
        	}
        	$counter= $counter + 1;
        }
        if (!isset($entities['gender'])) {
            $query = $query.",null";
        }
        $query = $query. ")";
        return executeNonQuery($query);
	}
	function addToFavoriteInDb($uid, $favoriteUser){
		$query = "INSERT INTO tbl_favorite VALUES(null, ".$uid.",".$favoriteUser.",'".date('Y-m-d', time())."')";
		return executeNonQuery($query);
	}
	function removeFromFavoriteInDb($uid, $favoriteUser){
		$query = "DELETE FROM tbl_favorite WHERE uid=".$uid." AND favorite_user=".$favoriteUser;
		return executeNonQuery($query);
	}
    function isFriendReqSentInDb($uid, $friendUser){
        $query  = "SELECT * FROM tbl_friend_req WHERE sender=".$uid." AND send_to=".$friendUser;
        $result = executeQuery($query);
        return mysqli_num_rows($result);
    }
    function isFriendInDb($uid, $friendUser){
        $query  = "SELECT * FROM tbl_friend WHERE (send_to=".$uid." AND sender=".$friendUser.") OR (sender=".$uid." AND send_to=".$friendUser.")";
        $result = executeQuery($query);
        return mysqli_num_rows($result);
    }
    function numOfFriendReqInDb($uid){
    	$query  = "SELECT * FROM tbl_friend_req WHERE send_to=".$uid;
    	$result = executeQuery($query);
    	return mysqli_num_rows($result);
    }
	function sendFriendReqInDb($uid, $friendUser){
		$query = "INSERT INTO tbl_friend_req VALUES(null,".$uid.",".$friendUser.",'".date('Y-m-d', time())."')";
		return executeNonQuery($query);
	}
	function cancelFriendReqInDb($uid, $favoriteUser){
		$query = "DELETE FROM tbl_friend_req WHERE sender=".$uid." AND send_to=".$favoriteUser;
		return executeNonQuery($query);
	}
    function acceptFriendRequestInDb($uid, $friend){
        $query = "INSERT INTO tbl_friend VALUES(null,".$uid.",".$friend.",'".date('Y-m-d', time())."')";
		return executeNonQuery($query);
    }
	function unFriendInDb($uid, $favoriteUser){
		$query = "DELETE FROM tbl_friend WHERE (send_to=".$uid." AND sender=".$favoriteUser.") OR (sender=".$uid." AND send_to=".$favoriteUser.")";
		return executeNonQuery($query);
	}
	function sendMessageTODb($message){
		$query = "INSERT INTO tbl_message VALUES(null,".$message['sender'].", ".$message['send_to'].", '".$message['time']."', '".$message['message']."',0)";
		return executeNonQuery($query);
	}
	function seenMessageInDb($uid, $sender){
		$query = "UPDATE tbl_message SET is_seen=1 WHERE send_to=".$uid;
		executeNonQuery($query);
	}
	function getUnseenMessageFromDb($uid){
		$query = "SELECT COUNT(*) AS number,sender FROM tbl_message WHERE send_to=".$uid." AND is_seen=0 GROUP BY sender";
		$result = executeQuery($query);
		if (mysqli_num_rows($result)==0) {
			return null;
		}
		foreach ($result as $message) {
			$newMessages[] = $message;
		}
		return $newMessages;
	}
	function getAllMessageByIdFromDb($uid, $sender){
		$query = "SELECT * FROM tbl_message WHERE (sender=".$uid." AND send_to=".$sender.") OR (sender=".$sender." AND send_to=".$uid.") ORDER BY ID";
		$result = executeQuery($query);
		if (mysqli_num_rows($result)==0) {
			return null;
		}
		while ($messages = mysqli_fetch_assoc($result)){
			$message[] = $messages;
		}
		return $message;
	}
	function hasUserHobbiesInDb($uid){
		$query = "SELECT * FROM tbl_user_hobby WHERE uid=".$uid;
		$result = executeQuery($query);
		return mysqli_num_rows($result);
	}
	function insertUserHobbiesToDb($uid,$user){
		$query = "INSERT INTO tbl_user_hobby VALUES ";
		$counter = 1;
		foreach ($user['hobbies'] as $hobby) {
			$query = $query."(".$uid.",".$hobby.")";
			if ($counter<sizeof($user['hobbies'])) {
				$query = $query." , ";
			}
			$counter++;
		}
		return executeNonQuery($query);
	}
	function deleteUserHobbiesByIdInDb($uid){
		$query = "DELETE FROM tbl_user_hobby WHERE uid=".$uid;
		return executeNonQuery($query);
	}
	function hasUserInterestsInDb($uid){
		$query = "SELECT * FROM tbl_user_interest WHERE uid=".$uid;
		$result = executeQuery($query);
		return mysqli_num_rows($result);
	}
	function insertUserInterestsToDb($uid,$user){
		$query = "INSERT INTO tbl_user_interest VALUES ";
		$counter = 1;
		foreach ($user['interests'] as $interest) {
			$query = $query."(".$uid.",".$interest.")";
			if ($counter<sizeof($user['interests'])) {
				$query = $query." , ";
			}
			$counter++;
		}
		return executeNonQuery($query);
	}
	function deleteUserInterestsByIdInDb($uid){
		$query = "DELETE FROM tbl_user_interest WHERE uid=".$uid;
		return executeNonQuery($query);
	}
	function hasUserMusicsInDb($uid){
		$query = "SELECT * FROM tbl_user_music WHERE uid=".$uid;
		$result = executeQuery($query);
		return mysqli_num_rows($result);
	}
	function insertUserMusicsToDb($uid,$user){
		$query = "INSERT INTO tbl_user_music VALUES ";
		$counter = 1;
		foreach ($user['musics'] as $music) {
			$query = $query."(".$uid.",".$music.")";
			if ($counter<sizeof($user['musics'])) {
				$query = $query." , ";
			}
			$counter++;
		}
		return executeNonQuery($query);
	}
	function deleteUserMusicsByIdInDb($uid){
		$query = "DELETE FROM tbl_user_music WHERE uid=".$uid;
		return executeNonQuery($query);
	}
	function hasUserSportsInDb($uid){
		$query = "SELECT * FROM view_user_sports WHERE uid=".$uid;
		$result = executeQuery($query);
		return mysqli_num_rows($result);
	}
	function insertUserSportsToDb($uid,$user){
		$query = "INSERT INTO tbl_user_sports VALUES ";
		$counter = 1;
		foreach ($user['sports'] as $sport) {
			$query = $query."(".$uid.",".$sport.")";
			if ($counter<sizeof($user['sports'])) {
				$query = $query." , ";
			}
			$counter++;
		}
		return executeNonQuery($query);
	}
	function deleteUserSportsByIdInDb($uid){
		$query = "DELETE FROM tbl_user_sports WHERE uid=".$uid;
		return executeNonQuery($query);
	}
?>
