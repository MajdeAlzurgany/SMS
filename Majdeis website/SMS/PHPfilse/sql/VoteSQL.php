<?php
require_once('C:\xampp\htdocs\SMS\Majdeis website\SMS\database\database.php');

class VoteSql{

    function __construct(){}

    public static function insertVote($vote){
        try{
            $userId = $vote->getUserId();
            $postId = $vote->getPostId();
            $voteType = $vote->getVoteType();

            $myDB = new database();
            $myDB->establishConnection();

            // Check if the user has already voted on the post
            $checkQuery = "SELECT vote_type_id FROM userisvote WHERE user_id = '$userId' AND post_id = '$postId'";
            $checkResult = $myDB->query_exexute($checkQuery);
            $existingVote = $checkResult->fetch_assoc();

            if ($existingVote) {
                // If the user has already voted, update the vote type instead of inserting a new vote
                $existingVoteType = $existingVote['vote_type_id'];

                if ($existingVoteType != $voteType) {
                    // If the new vote type is different from the existing one, update the vote
                    $updateQuery = "UPDATE userisvote SET vote_type_id = '$voteType' WHERE user_id = '$userId' AND post_id = '$postId'";
                    $myDB->query_exexute($updateQuery);
                    echo "<p>Your vote has been updated successfully!</p>";
                } else {
                    echo "<p>You have already voted with the same type.</p>";
                }
            } else {
                // If the user hasn't voted before, insert a new vote
                $insertQuery = "INSERT INTO userisvote (user_id, post_id, vote_type_id) VALUES ('$userId', '$postId', '$voteType')";
                $myDB->query_exexute($insertQuery);
                echo "<p>Your vote has been recorded successfully!</p>";
            }
        }catch(Exception $e){
            echo $e->getMessage();
        }finally{
            $myDB->closeConnection();
        }
    }

    public static function countVotesByPostId($postId){
        try{
            $myDB = new database();
            $myDB->establishConnection();

            // Count upvotes (vote_type_id = 1)
            $upvoteQuery = "SELECT COUNT(*) AS upvote_count FROM userisvote WHERE post_id = '$postId' AND vote_type_id = 1";
            $upvoteResult = $myDB->query_exexute($upvoteQuery);
            $upvoteRow = $upvoteResult->fetch_assoc();
            $upvoteCount = $upvoteRow['upvote_count'];

            // Count downvotes (vote_type_id = 2)
            $downvoteQuery = "SELECT COUNT(*) AS downvote_count FROM userisvote WHERE post_id = '$postId' AND vote_type_id = 2";
            $downvoteResult = $myDB->query_exexute($downvoteQuery);
            $downvoteRow = $downvoteResult->fetch_assoc();
            $downvoteCount = $downvoteRow['downvote_count'];

            // Return both upvotes and downvotes counts as an array
            return array('upvotes' => $upvoteCount, 'downvotes' => $downvoteCount);
        }catch(Exception $e){
            echo $e->getMessage();
            return array('upvotes' => 0, 'downvotes' => 0);
        }finally{
            $myDB->closeConnection();
        }
    }
}
?>
