<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<!-- Filter Dropdown Kategori -->
<h3>Filter Kategori</h3>
<form method="get" class="form-inline mb-3">
    <select name="kategori_id" class="form-control" onchange="this.form.submit()">
        <option value=""> Semua Kategori </option>
        <?php foreach ($kategori as $k): ?>
            <option value="<?= $k['id_kategori']; ?>" <?= ($kategori_id == $k['id_kategori']) ? 'selected' : ''; ?>>
                <?= esc($k['nama_kategori']); ?>
            </option>
        <?php endforeach; ?>
    </select>
</form>

<hr class="divider" />

<!-- Daftar Artikel -->
<?php if ($artikel) : ?>
    <?php foreach ($artikel as $row) : ?>
        <article class="entry">
            <h2>
                <a href="<?= base_url('/artikel/' . $row['slug']); ?>">
                    <?= esc($row['judul']); ?>
                </a>
            </h2>

            <p><strong>Kategori:</strong> <?= esc($row['nama_kategori']); ?></p>

            <?php if (!empty($row['gambar'])) : ?>
                <img src="<?= base_url('/gambar/' . $row['gambar']); ?>" alt="<?= esc($row['judul']); ?>" class="artikel-gambar">
            <?php endif; ?>

            <p><?= esc(substr($row['isi'], 0, 200)); ?>...</p>
        </article>
        <hr class="divider" />
    <?php endforeach; ?>
<?php else : ?>
    <article class="entry">
        <h2>Belum ada data.</h2>
    </article>
<?php endif; ?>

<?= $this->endSection() ?>