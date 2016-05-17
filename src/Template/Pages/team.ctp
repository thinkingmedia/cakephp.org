<?php
use Cake\Core\Configure;
$title = __('CakePHP | Rapid Development PHP Framework | Core team profiles');
$description = __('Meet the CakePHP Core development team');
$this->assign('title', $title);
$this->assign('meta', $this->Html->meta('description', $description));
$this->assign('socialMeta', $this->Meta->socialTags(['title' => $title, 'description' => $description]));
$team = Configure::read('Team');
$i = 0;
$elementsByRow = 3;
?>

<section id="team-cake">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 text-center t-team">
				<h1><span class="glyph_range">V</span><em>The</em><strong>Bakers</strong><span class="glyph_range">V</span></h1>
				<h3><?= __('Meet the team behind CakePHP')?></h3>
			</div>
			<div class="col-sm-12">
				<?php foreach($team as $member):
					$i++;?>
					<div class="col-sm-6 col-md-4 padd-team">
						<div class="portfolio-el view view-team text-center">
							<?= $this->Html->image($member['image-url'], ['alt' => $member['name']])?>
							<a class="mask" data-target="#team-larry" data-toggle="modal">
								<div class="t-team-read">
									<h6><?= __('read more')?></h6>
								</div>
							</a>
						</div>
						<div class="text-team">
							<div class="d-team"></div>
							<h3><?= $member['name'] ?></h3>
							<h5><?= $member['role'] ?></h5>
						</div>
					</div>
					<?php if ($i % $elementsByRow == 0):?>
						<div class="clearfix hidden-xs hidden-sm"></div>
					<?php endif;?>
				<?php endforeach;?>
			</div>
		</div>
	</div>
</section>

<?= $this->element('home/share')?>

<?= $this->element('home/newsletter')?>