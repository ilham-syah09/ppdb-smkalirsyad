<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <?php if ($wali->nama_ayah === NULL || $wali->nama_ibu === NULL || $wali->nama_wali === NULL || $wali->no_handphone === NULL || $wali->pendidikan_ayah === NULL || $wali->pendidikan_ibu === NULL || $wali->pekerjaan_ayah === NULL || $wali->pekerjaan_ibu === NULL || $wali->penghasilan_ayah === NULL || $wali->penghasilan_ibu === NULL) : ?>
                        <div class="row">
                            <div class="col-md">
                                <div class="alert alert-danger">
                                    <h4>HARAP LENGKAPI BIODATA DAN DATA ORANG TUA/WALI TERLEBIH DAHULU</h4>
                                </div>
                            </div>
                        </div>
                    <?php else : ?>
                        <div class="row">
                            <div class="col-md">
                                <h4>Langkah setelah pengisian</h4>
                                <ul>
                                    <li>1. Unduh Resume Biodata Peserta didik</li>
                                    <li>2. Cetak atau Tunjukan langsung Resume Formulir Peserta Didik Baru yang sudah di Unduh kepada petugas PPDB di SMK AL-IRSYAD Tegal</li>
                                    <li>3. Langkah pendaftaran selanjutnya akan diarahkan oleh petugas PPDB SMK AL-IRSYAD Tegal ketika menunjukan Resume Formulir Peserta Didik Baru yang sudah di Unduh</li>
                                    <li>4. Konsultasi bisa melalui WhatsApp Kami di nomor 081803909008 (Waryadi) / 089654278142 (Admin)</li>
                                </ul>
                                <a href="<?= base_url('user/biodata/printBiodata'); ?>" target="_blank" class="btn btn-sm btn-primary" download><i class="fas fa-download"></i> Unduh Resume Biodata</a>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</div>