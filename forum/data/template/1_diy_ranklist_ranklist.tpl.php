<? if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('ranklist');
0
|| checktplrefresh('./template/default/ranklist/ranklist.htm', './template/default/ranklist/side_left.htm', 1287938820, 'diy', './data/template/1_diy_ranklist_ranklist.tpl.php', './template/default', 'ranklist/ranklist')
;?><? include template('common/header'); ?><style id="diy_style" type="text/css"></style>

<!--[diy=diyranklisttop]--><div id="diyranklisttop" class="area"></div><!--[/diy]-->

<div id="ct" class="ct2_a wp cl">
<div class="mn">

<!--[diy=diycontenttop]--><div id="diycontenttop" class="area"></div><!--[/diy]-->
<? if($ranklist_setting['member']['available']) { ?>
<div class="bm">
<div class="bm_h cl">
<span class="y">
<a href="misc.php?mod=ranklist&amp;type=member" class="xi1 xw1">我要上榜</a>
<span class="pipe">|</span>
<a href="misc.php?mod=ranklist&amp;type=member">更多&rsaquo;</a>
</span>
<h2>竞价排名</h2>
</div>
<div class="bm_c bid">
<ul class="biduser cl">
<li class="bidtop">
<? if($memberlist) { ?>
<a href="home.php?mod=space&amp;uid=<?=$memberlist['0']['uid']?>&amp;do=profile" target="_blank" id="bid_<?=$memberlist['0']['uid']?>" class="hm" onmouseover="showMenu({'ctrlid':this.id,'pos':'12'})"><?php echo avatar($memberlist[0][uid],middle); ?></a>
<? if($memberlist['0']['note']) { ?>
<div id="bid_<?=$memberlist['0']['uid']?>_menu" style="display:none;">
<p class="crly"><strong><?=$memberlist['0']['username']?></strong>: <?=$memberlist['0']['note']?></p>
<p class="mncr"></p>
</div>
<? } } ?>
</li><?php unset($memberlist[0]); if(is_array($memberlist)) foreach($memberlist as $member) { ?><li>
<a href="home.php?mod=space&amp;uid=<?=$member['uid']?>&amp;do=profile" target="_blank" id="bid_<?=$member['uid']?>" onmouseover="showMenu({'ctrlid':this.id,'pos':'12'})"><?=$member['avatar']?></a>
<? if($member['note']) { ?>
<div id="bid_<?=$member['uid']?>_menu" style="display:none;">
<p class="crly"><strong><?=$member['username']?></strong>: <?=$member['note']?></p>
<p class="mncr"></p>
</div>
<? } ?>
</li>
<? } ?>
</ul>
</div>
</div>
<? } ?>

<!--[diy=diypictop]--><div id="diypictop" class="area"></div><!--[/diy]-->
<? if($ranklist_setting['picture']['available']) { ?>
<div class="rnk1">
<div class="bm">
<div class="bm_h cl">
<span class="y">
<a href="misc.php?mod=ranklist&amp;type=picture&amp;orderby=heats&amp;before=all">更多&rsaquo;</a>
</span>
<h2>图片排行</h2>
</div>
<div class="bm_c">
<ul class="ml mlp cl">
<? if($pictures) { ?>
<li class="d bigpic">
<div class="c">
<a href="home.php?mod=space&amp;uid=<?=$pictures['0']['uid']?>&amp;do=album&amp;picid=<?=$pictures['0']['picid']?>" target="_blank"><img src="<?=$pictures['0']['origurl']?>" alt="" /></a>
</div>
<p class="ptm"><a href="home.php?mod=space&amp;uid=<?=$pictures['0']['uid']?>&amp;do=album&amp;picid=<?=$pictures['0']['picid']?>" target="_blank"><?=$pictures['0']['albumname']?></a></p>
</li>
<? } ?><?php unset($pictures[0]); if(is_array($pictures)) foreach($pictures as $pic) { ?><li class="d">
<div class="c">
<a href="home.php?mod=space&amp;uid=<?=$pic['uid']?>&amp;do=album&amp;picid=<?=$pic['picid']?>" target="_blank"><img src="<?=$pic['url']?>" alt="" /></a>
</div>
<p class="ptm"><a href="home.php?mod=space&amp;uid=<?=$pic['uid']?>&amp;do=album&amp;picid=<?=$pic['picid']?>" target="_blank"><?=$pic['albumname']?></a></p>
</li>
<? } ?>
</ul>
</div>
</div>
</div>
<? } ?>

<!--[diy=diycontentmiddle]--><div id="diycontentmiddle" class="area"></div><!--[/diy]-->
<div class="bm2 cl">

<? if($ranklist_setting['thread']['available']) { ?>
<div class="bm2_b <? if($thread_pos % 2 == 0) { ?>bm2_b_y<? } ?>">
<div class="bm_h cl">
<span class="y xi2"><a href="misc.php?mod=ranklist&amp;type=thread&amp;orderby=replies&amp;before=<?=$before?>">更多&rsaquo;</a></span>
<h2>帖子排行</h2>
</div>
<div class="bm_c">
<ol class="xl xl1"><? if(is_array($threads_hot)) foreach($threads_hot as $thread) { ?><li>
<em><a href="home.php?mod=space&amp;uid=<?=$thread['authorid']?>" target="_blank"><?=$thread['author']?></a></em>
<a href="forum.php?mod=viewthread&amp;tid=<?=$thread['tid']?>" target="_blank"><?=$thread['subject']?></a>
</li>
<? } ?>
</ol>
</div>
</div>
<? } if($ranklist_setting['blog']['available']) { ?>
<div class="bm2_b <? if($blog_pos % 2 == 0) { ?>bm2_b_y<? } ?>">
<div class="bm_h cl">
<span class="y xi2"><a href="misc.php?mod=ranklist&amp;type=blog&amp;orderby=heats&amp;before=<?=$before?>">更多&rsaquo;</a></span>
<h2>日志排行</h2>
</div>
<div class="bm_c">
<ol class="xl xl1"><? if(is_array($blogs_hot)) foreach($blogs_hot as $blog) { ?><li>
<em><a href="home.php?mod=space&amp;uid=<?=$blog['uid']?>" target="_blank"><?=$blog['username']?></a></em>
<a href="home.php?mod=space&amp;uid=<?=$blog['uid']?>&amp;do=blog&amp;id=<?=$blog['blogid']?>" target="_blank"><?=$blog['subject']?></a>
</li>
<? } ?>
</ol>
</div>
</div>
<? } if($ranklist_setting['poll']['available']) { ?>
<div class="bm2_b <? if($poll_pos % 2 == 0) { ?>bm2_b_y<? } ?>">
<div class="bm_h cl">
<span class="y xi2"><a href="misc.php?mod=ranklist&amp;type=poll&amp;orderby=heats&amp;before=<?=$before?>">更多&rsaquo;</a></span>
<h2>投票排行</h2>
</div>
<div class="bm_c">
<ol class="xl xl1"><? if(is_array($polls_hot)) foreach($polls_hot as $poll) { ?><li>
<em><a href="home.php?mod=space&amp;uid=<?=$poll['authorid']?>" target="_blank"><?=$poll['author']?></a></em>
<a href="forum.php?mod=viewthread&amp;tid=<?=$poll['tid']?>" target="_blank"><?=$poll['subject']?></a>
</li>
<? } ?>
</ol>
</div>
</div>
<? } if($ranklist_setting['activity']['available']) { ?>
<div class="bm2_b <? if($activity_pos % 2 == 0) { ?>bm2_b_y<? } ?>">
<div class="bm_h cl">
<span class="y xi2"><a href="misc.php?mod=ranklist&amp;type=activity&amp;orderby=heats&amp;before=<?=$before?>">更多&rsaquo;</a></span>
<h2>活动排行</h2>
</div>
<div class="bm_c">
<ol class="xl xl1"><? if(is_array($activities_hot)) foreach($activities_hot as $activity) { ?><li>
<em><a href="home.php?mod=space&amp;uid=<?=$activity['authorid']?>" target="_blank"><?=$activity['author']?></a></em>
<a href="forum.php?mod=viewthread&amp;tid=<?=$activity['tid']?>" target="_blank"><?=$activity['subject']?></a>
</li>
<? } ?>
</ol>
</div>
</div>
<? } ?>

</div>

<!--[diy=diycontentbottom]--><div id="diycontentbottom" class="area"></div><!--[/diy]-->
</div>

<div class="appl">
<!--[diy=diysidetop]--><div id="diysidetop" class="area"></div><!--[/diy]--><div class="tbn">
<h2 class="mt bbda"><?=$_G['setting']['navs']['8']['navname']?></h2>
<ul>
<li class="cl<? if($_G['gp_type'] == 'index' || !$_G['gp_type']) { ?> a<? } ?>"><a href="misc.php?mod=ranklist">全部</a></li>
<? if($ranklist_setting['member']['available']) { ?>
<li class="cl<? if($_G['gp_type'] == 'member') { ?> a<? } ?>"><a href="misc.php?mod=ranklist&amp;type=member">用户</a></li>
<? } if($ranklist_setting['thread']['available']) { ?>
<li class="cl<? if($_G['gp_type'] == 'thread') { ?> a<? } ?>"><a href="misc.php?mod=ranklist&amp;type=thread&amp;orderby=replies&amp;before=thisweek">帖子</a></li>
<? } if($ranklist_setting['blog']['available']) { ?>
<li class="cl<? if($_G['gp_type'] == 'blog') { ?> a<? } ?>"><a href="misc.php?mod=ranklist&amp;type=blog&amp;orderby=heats&amp;before=thisweek">日志</a></li>
<? } if($ranklist_setting['poll']['available']) { ?>
<li class="cl<? if($_G['gp_type'] == 'poll') { ?> a<? } ?>"><a href="misc.php?mod=ranklist&amp;type=poll&amp;orderby=heats&amp;before=thisweek">投票</a></li>
<? } if($ranklist_setting['activity']['available']) { ?>
<li class="cl<? if($_G['gp_type'] == 'activity') { ?> a<? } ?>"><a href="misc.php?mod=ranklist&amp;type=activity&amp;orderby=heats&amp;before=thismonth">活动</a></li>
<? } if($ranklist_setting['picture']['available']) { ?>
<li class="cl<? if($_G['gp_type'] == 'picture') { ?> a<? } ?>"><a href="misc.php?mod=ranklist&amp;type=picture&amp;orderby=heats&amp;before=thismonth">图片</a></li>
<? } if($ranklist_setting['forum']['available']) { ?>
<li class="cl<? if($_G['gp_type'] == 'forum') { ?> a<? } ?>"><a href="misc.php?mod=ranklist&amp;type=forum&amp;orderby=threads&amp;before=all">版块</a></li>
<? } if($ranklist_setting['group']['available']&&$_G['setting']['groupstatus']) { ?>
<li class="cl<? if($_G['gp_type'] == 'group') { ?> a<? } ?>"><a href="misc.php?mod=ranklist&amp;type=group&amp;orderby=credit&amp;before=all">群组</a></li>
<? } ?>
</ul>
<?php if(!empty($_G['setting']['pluginhooks']['ranklist_nav_extra'])) echo $_G['setting']['pluginhooks']['ranklist_nav_extra']; ?>
</div><!--[diy=diysidebottom]--><div id="diysidebottom" class="area"></div><!--[/diy]-->
</div>
</div>

<!--[diy=diyranklistbottom]--><div id="diyranklistbottom" class="area"></div><!--[/diy]--><? include template('common/footer'); ?>