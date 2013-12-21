      <?php if($this->session->userdata('user_id')){ ?>
      <p>You are logged in mothafucka!</p>
      <p>You are <?=$this->session->userdata('user_type')?>.</p>
      <?= anchor('/users/logout', 'Log out', 'title="Log out"')."<br />"; ?>
      <?= anchor('/posts/new_post', 'Add Post', 'title="Add post"'); ?>
      <? } else { ?>
      <?= anchor('/users/login', 'Login', 'title="Login"')."<br />"; ?>
      <?= anchor('/users/register', 'Registrate', 'title="Registrate"'); ?>
      <? } ?>
      
  		<?php if(!isset($posts)){ ?>
	  		<p>No posts to load foo!</p>
	  	<?php } else { 
	  		foreach ($posts as $row){ ?>
	  			<article>		  	
					<h3><a href="<?=base_url()?>posts/post/<?=$row['post_id']?>"><?=$row['cim']?></a><br /><a href="<?=base_url()?>posts/edit_post/<?=$row['post_id']?>">Edit</a> - <a href="<?=base_url()?>posts/delete_post/<?=$row['post_id']?>">Delete</a></h3>
					<span class="date"><?=$row['datum']?></span>
					<p class="post-exerpt"><?=substr(strip_tags($row['post_szoveg']),0,200).".."?><p>
					<p class="more-link"><a href="<?=base_url()?>posts/post/<?=$row['post_id']?>">Read More</a></p>
				</article>
			<?php }
		}; ?>
    <?=$pages?>
