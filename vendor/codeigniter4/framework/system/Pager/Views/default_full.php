<?php

use CodeIgniter\Pager\PagerRenderer;

/**
 * @var PagerRenderer $pager
 */
$pager->setSurroundCount(2);
?>

<nav aria-label="<?= lang('Pager.pageNavigation') ?>">
	<ul class="pagination justify-content-center mt-3">
		<?php if ($pager->hasPrevious()) : ?>
			<li class="page-item ms-3">
				<a class="page-link bg-warning fw-bold" href="<?= $pager->getFirst() ?>" aria-label="<?= lang('Pager.first') ?>">
					<span aria-hidden="true"><?= lang('Pager.first') ?></span>
				</a>
			</li>
			<li class="page-item ms-3">
				<a class="page-link bg-warning fw-bold" href="<?= $pager->getPrevious() ?>" aria-label="<?= lang('Pager.previous') ?>">
					<span aria-hidden="true"><?= lang('Pager.previous') ?></span>
				</a>
			</li>
		<?php endif ?>

		<?php if(current_url() == base_url('trainer/show')){ ?>
		<?php foreach ($pager->links() as $link) : ?>
			<li class="page-item ms-3" <?= $link['active'] ? 'class="active"' : '' ?>>
				<a class="page-link fw-bold pages" id="<?= $link['title'] ?>" href="<?= $link['uri'] ?>">
					<?= $link['title'] ?>
				</a>
			</li>
		<?php endforeach ?>
		<?php } ?>

		<?php if(current_url() == base_url('Members/membership')){ ?>
		<?php foreach ($pager->links_5() as $link) : ?>
			<li class="page-item ms-3" <?= $link['active'] ? 'class="active"' : '' ?>>
				<a class="page-link fw-bold members_pages" id="<?= $link['title'] ?>" href="<?= $link['uri'] ?>">
					<?= $link['title'] ?>
				</a>
			</li>
		<?php endforeach ?>
		<?php } ?>

		<?php if(current_url() == base_url('amenities/display_amenities')){ ?>
		<?php foreach ($pager->links_3() as $link) : ?>
			<li class="page-item ms-3" <?= $link['active'] ? 'class="active"' : '' ?>>
				<a class="page-link fw-bold ammenities" id="<?= $link['title'] ?>" href="<?= $link['uri'] ?>">
					<?= $link['title'] ?>
				</a>
			</li>
		<?php endforeach ?>
		<?php } ?>

		<?php if(current_url() == base_url('Contact/enquiries')){ ?>
		<?php foreach ($pager->links_4() as $link) : ?>
			<li class="page-item ms-3" <?= $link['active'] ? 'class="active"' : '' ?>>
				<a class="page-link fw-bold contacts_pages" id="<?= $link['title'] ?>" href="<?= $link['uri'] ?>">
					<?= $link['title'] ?>
				</a>
			</li>
		<?php endforeach ?>
		<?php } ?>

		<?php if(current_url() == base_url('blogs/view_blog')){ ?>
		<?php foreach ($pager->links_6() as $link) : ?>
			<li class="page-item ms-3" <?= $link['active'] ? 'class="active"' : '' ?>>
				<a class="page-link fw-bold blog_pages" id="<?= $link['title'] ?>" href="<?= $link['uri'] ?>">
					<?= $link['title'] ?>
				</a>
			</li>
		<?php endforeach ?>
		<?php } ?>

		<?php if ($pager->hasNext()) : ?>
			<li class="page-item ms-3">
				<a class="page-link bg-warning fw-bold" href="<?= $pager->getNext() ?>" aria-label="<?= lang('Pager.next') ?>">
					<span aria-hidden="true"><?= lang('Pager.next') ?></span>
				</a>
			</li>
			<li class="page-item ms-3">
				<a class="page-link bg-warning fw-bold" href="<?= $pager->getLast() ?>" aria-label="<?= lang('Pager.last') ?>">
					<span aria-hidden="true"><?= lang('Pager.last') ?></span>
				</a>
			</li>
		<?php endif ?>
	</ul>
</nav>
