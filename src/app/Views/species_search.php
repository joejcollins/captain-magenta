<?= $this->extend('default') ?>
<?= $this->section('content') ?>
<h2 class="text-start text-md-center">Search for a Species in Shropshire</h2>

<?= form_open('species') ?>

<div class="row mb-2">
	<div class="col-lg-8 mx-auto">
		<label for="search" class="form-label visually-hidden">Species name</label>
		<div class="input-group">
			<input type="text" id="search" class="form-control" name="search" aria-describedby="search-help" placeholder="Species name" value="<?= set_value('search', $nameSearchString); ?>" />
			<button type="submit" class="btn btn-primary">List Species</button>
		</div>
		<small id="search-help" class="form-text text-start text-md-center d-block">Enter all or part of a species name. Try something like "Hedera".</small>
	</div>
</div>
<div class="row justify-content-center gy-3">
	<div class="form-group col-sm-4 col-lg-3">
		<div class="form-check">
			<input class="form-check-input" type="radio" name="name-type" id="scientific-name" value="scientific" <?= set_radio('name-type', 'scientific', ($nameType === 'scientific')); ?> />
			<label class="form-check-label" for="scientific-name">
				scientific<span class="d-none d-lg-inline"> name only</span>
			</label>
		</div>
		<div class="form-check">
			<input class="form-check-input" type="radio" name="name-type" id="common-name" value="common" <?= set_radio('name-type', 'common', ($nameType === 'common')); ?> />
			<label class="form-check-label" for="common-name">
				common<span class="d-none d-lg-inline"> name only</span>
			</label>
		</div>
		<div class="form-check">
			<input class="form-check-input" type="radio" name="name-type" id="axiophyte-name" value="axiophyte" <?= set_radio('name-type', 'axiophyte'); ?> disabled/>
			<label class="form-check-label" for="axiophyte-name">
				<span class="d-lg-none">axiophyte names</span>
				<span class="d-none d-lg-inline">axiophyte scientific name only</span>
			</label>
		</div>
	</div>
<!-- </div>
<div class="row"> -->
	<div class="form-group col-sm-4 col-lg-3">
		<!-- <label for="in" class="col-md-2 col-form-label d-none d-md-inline">Groups</label> -->

		<div class="form-check">
			<input class="form-check-input" type="radio" name="species-group" id="plants" value="plants" <?= set_radio('groups', 'plants', $speciesGroup === 'plants'); ?> />
			<label class="form-check-label" for="plants">
				only plants
			</label>
		</div>
		<div class="form-check">
			<input class="form-check-input" type="radio" name="species-group" id="bryophytes" value="bryophytes" <?= set_radio('groups', 'bryophytes', $speciesGroup === 'bryophytes'); ?> />
			<label class="form-check-label" for="bryophytes">
				only bryophytes
			</label>
		</div>
		<div class="form-check">
			<input class="form-check-input" type="radio" name="species-group" id="both" value="both" <?= set_radio('groups', 'both', $speciesGroup === 'both'); ?> />
			<label class="form-check-label" for="both">
			both <span class="d-none d-xl-inline">plants and bryophytes</span>
			</label>
		</div>

	</div>
</div>
<?= form_close() ?>
<!-- Show the search results if there are any -->
<?php if (isset($speciesList)) : ?>
	<table class="table mt-3">
		<thead>
			<tr>
				<th class="d-none d-md-table-cell">Family</th>
				<th>Scientific Name</th>
				<th class="d-none d-sm-table-cell">Common Name</th>
				<th>Records</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($speciesList as $species) : ?>
				<tr>
					<td class="d-none d-md-table-cell"><?= $species->family ?></td>
					<td><a href="<?= base_url('/species/' . $species->name) ?>"><?= $species->name ?></a></td>
					<td class="d-none d-sm-table-cell">
						<a href="<?= base_url('/species/' . $species->name . '?name=' . $species->commonName ) ?>"><?= $species->commonName ?></a>
					</td>
					<td><?= $species->count ?></td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
	<nav>
		<ul class="pagination justify-content-center">
			<li class="page-item"><a class="page-link" href="#">Previous</a></li>
			<li class="page-item"><a class="page-link" href="#">1</a></li>
			<li class="page-item"><a class="page-link" href="#">2</a></li>
			<li class="page-item"><a class="page-link" href="#">3</a></li>
			<li class="page-item"><a class="page-link" href="#">Next</a></li>
		</ul>
	</nav>
	<?php if (isset($downloadLink)) : ?>
	<p><a href="<?= $downloadLink ?>">Download this data</a></p>
	<?php endif ?>
<?php endif ?>

<?= $this->endSection() ?>
