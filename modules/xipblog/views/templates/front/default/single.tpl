{block name='head' append}
	<meta property="og:type" content="article"/>
	<meta property="og:title" content="{$xipblogpost.post_title}">
  	<meta property="og:image" content="{_PS_BASE_URL_}{$xipblogpost.post_img_large}" />
  	{if isset($xipblogpost.post_excerpt) && !empty($xipblogpost.post_excerpt)}
  		<meta property="og:description" content="{$xipblogpost.post_excerpt|truncate:160:' ...'|escape:'html':'UTF-8'}">
	{else}
		<meta property="og:description" content="{$xipblogpost.post_content|truncate:160:' ...'|escape:'html':'UTF-8'}">
	{/if}
{/block}
{extends file='page.tpl'}
{block name="page_content"}
	<div class="kr_blog_post_area single">
		<div class="kr_blog_post_inner">
			<article id="blog_post" class="blog_post blog_post_{$xipblogpost.post_format}">
				<div class="blog_post_content">
					<div class="blog_post_content_top">
						<div class="post_thumbnail">
							{if $xipblogpost.post_format == 'video'}
								{assign var="postvideos" value=','|explode:$xipblogpost.video}
								{if $postvideos|@count > 1 }
									{assign var="class" value='carousel'}
								{else}
									{assign var="class" value=''}
								{/if}
								{include file="module:xipblog/views/templates/front/default/post-video.tpl" postvideos=$postvideos width='870' height="482" class=$class}
							{elseif $xipblogpost.post_format == 'audio'}
								{assign var="postaudio" value=','|explode:$xipblogpost.audio}
								{if $postaudio|@count > 1 }
									{assign var="class" value='carousel'}
								{else}
									{assign var="class" value=''}
								{/if}
								{include file="module:xipblog/views/templates/front/default/post-audio.tpl" postaudio=$postaudio width='870' height="482" class=$class}
							{elseif $xipblogpost.post_format == 'gallery'}
								{if $xipblogpost.gallery_lists|@count > 1 }
									{assign var="class" value='carousel'}
								{else}
									{assign var="class" value=''}
								{/if}
								{include file="module:xipblog/views/templates/front/default/post-gallery.tpl" gallery_lists=$xipblogpost.gallery_lists imagesize="medium" class=$class}
							{else}
								<img class="xipblog_img img-responsive" src="{$xipblogpost.post_img_large}" alt="{$xipblogpost.post_title}">
							{/if}
						</div>
					</div>
					<div class="post_content">
						<h3 class="post_title">{$xipblogpost.post_title}</h3>
						<div class="post_meta clearfix">
							<p class="meta_author">
								{l s='Posted by ' mod='xipblog'}
								<span>{$xipblogpost.post_author_arr.firstname} {$xipblogpost.post_author_arr.lastname}</span>
							</p>
							<p class="meta_date">
								{$xipblogpost.post_date|date_format:"%b %dTH, %Y"}
							</p>
							<p class="meta_category">
									<a href="{$xipblogpost.category_default_arr.link}">{$xipblogpost.category_default_arr.name}</a>
							</p>
						</div>
						<div class="post_description">
							<p>{$xipblogpost.post_content nofilter}</p>
						</div>
					</div>
				</div>
			</article>
		</div>
	</div>
	<div class="post-social-sharing">
		<span>{l s='Share' d='Shop.Theme.Global'}</span>
		<ul>
		<li class="facebook"><a href="https://www.facebook.com/sharer.php?u={$share_url}" target="_blank"><i class="ion-social-facebook"></i></a></li>
		<li class="pinterest"><a href="https://www.pinterest.com/pin/create/button/?url={$share_url}&media={$share_image}" target="_blank"><i class="ion-social-pinterest"></i></a></li>
		<li class="twitter"><a href="https://twitter.com/intent/tweet?text={$share_title}%20{$share_url}" target="_blank"><i class="ion-social-twitter"></i></a></li>
		<li class="linkedin"><a href="https://www.linkedin.com/shareArticle?mini=true&url={$share_url}&title={$share_title}&summary={$share_des}&source={$share_url}" target="_blank"><i class="ion-social-linkedin"></i></a></li>
		<li class="email"><a href="mailto:?subject={$share_title}&body={$share_des}\n{$share_url}" target="_blank"><i class="ion-email"></i></a></li>
		<li class="whatsapp"><a href="https://api.whatsapp.com/send?text=*{$share_title}*%0A{$share_des}%0A{$share_url}" target="_blank"><i class="ion-social-whatsapp"></i></a></li>

		</ul>
		
	</div>
	{if ($xipblogpost.comment_status == 'open') || ($xipblogpost.comment_status == 'close')}
				{include file="module:xipblog/views/templates/front/default/comment-list.tpl"}
	{/if}
	{if (isset($disable_blog_com) && $disable_blog_com == 1) && ($xipblogpost.comment_status == 'open')}
				{include file="module:xipblog/views/templates/front/default/comment.tpl"}
	{/if}
{/block}
{block name='breadcrumb'}
<div class="breadcrumb_container">
	<div class="container">
  <nav data-depth="{$breadcrumb.count+1}" class="breadcrumb">
    <ol itemscope itemtype="http://schema.org/BreadcrumbList">
      {foreach from=$breadcrumb.links item=path name=breadcrumb}
        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
          <a itemprop="item" href="{$path.url}">
            <span itemprop="name">{$path.title}</span>
          </a>
          <meta itemprop="position" content="{$smarty.foreach.breadcrumb.iteration}">
        </li>
      {/foreach}
		<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
			<span itemprop="name">{l s='Single Blog' mod='xipblog'}</span>
		</li>
    </ol>
  </nav>
  	</div>
</div>
{/block}