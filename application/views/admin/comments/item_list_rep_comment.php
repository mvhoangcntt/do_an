<?php if (!empty($data)) foreach ($data as $key => $value): 
  $timeAgo = timeAgo($value->created_time);
  $oneUser = getUserAccountById($value->account_id);
?>
<li id="list">
  <div class="comment-avatar"><img src="https://gravatar.com/avatar/412c0b0ec99008245d902e6ed0b264ee?s=80" ></div>
  <div class="comment-box">
    <div class="comment-head">
      <h6 class="comment-name by-reply"><a href="javascript:;"><?php echo !empty($oneUser->full_name) ? $oneUser->full_name : '' ?></a></h6>
      <span name="created_time"><?php echo $timeAgo ?></span>
      <a href="javascript:;" onclick="delete_comment('<?php echo $value->id ?>',this)"><i class="fa fa-trash"></i></a>                        
      
    </div>
    <div class="comment-content"><?php echo $value->content ?></div>
  </div>
</li>
<?php endforeach ?>