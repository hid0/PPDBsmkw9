<div class="w3-container">
	<p align="center">REGISTRASI CALON PESERTA DIDIK <br>
		<b> SMK WALISONGO PECANGAAN JEPARA</b></p>
	<?php
	if (empty($_GET['a'])) {
			?>
		<form method="post" action="proccess.php?step=1"><br />
			<table class="w3-table w3-border w3-striped w3-container" style="max-width:90%;margin: 0 auto;box-shadow: 0px 10px 20px #eee">
				<tr>
					<td>Jenis pendaftaran</td>
					<td>
						<input type="radio" name="jp" value="baru" class="w3-check" checked>Baru |
						<input type="radio" name="jp" value="pindahan" class="w3-check">Pindahan
					</td>
				</tr>
				<tr>
					<td>Jalur pendaftaran</td>
					<td>
						<input type="radio" name="jap" value="umum" class="w3-check" checked>Umum | <input type="radio" name="jap" value="khusus" class="w3-check">Khusus
						<div id="jl_khusus" class="kieta" style="display:none;">
							<select class="w3-input w3-border" name="jl_khusus">
								<option>-Pilih Jalur Khusus-</option>
								<option value="yatim">Yatim / Yatim Piatu</option>
								<option value="mts/smp w9">dari MTs./SMP Walisongo</option>
								<option value="saudara 1 unit">Saudara Kandung siswa di Yayasan Walisongo</option>
								<option value="pa/pi guru/karyawan">Putra/i Guru/karyawan di Yayasan Walisongo</option>
								<option value="tahfidz">Peserta didik Tahfidz minimal 5 Juz</option>
							</select>
						</div>
						<script type="text/javascript">
							$(document).ready(function() {
								$('input[type="radio"]').click(function() {
									var f = $(this).val();
									$("div.kieta").hide();
									$("#jl_" + f).show();
								})
							});
						</script>
					</td>
				</tr>
				<tr>
					<td>
						Pilih Kompentensi keahlian 1
					</td>
					<td>
						<select class="w3-input w3-border" name="jurusan1" required>
							<option value="">PILIH JURUSAN</option>
							<option value="KT">KRIYA TEKSTIL</option>
							<option value="TKR">TEKNIK KENDARAAN RINGAN</option>
							<option value="TKJ">TEKNIK KOMPUTER JARINGAN</option>
							<option value="PBS">PERBANKAN SYARIAH</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>
						Pilih Kompentensi keahlian 2<br>
						<small>
							<font color=red>*</font><i>Pilihan jika kompetensi keahlian 1 mencapai batas kuota (sudah penuh)</i>
						</small>
					</td>
					<td>
						<select class="w3-input w3-border" name="jurusan2" required>
							<option value="">PILIH JURUSAN</option>
							<option value="KT">KRIYA TEKSTIL</option>
							<option value="TKR">TEKNIK KENDARAAN RINGAN</option>
							<option value="TKJ">TEKNIK KOMPUTER JARINGAN</option>
							<option value="PBS">PERBANKAN SYARIAH</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>
						Asal sekolah
					</td>
					<td>
						<input type="text" name="asal_sekolah" class="w3-input w3-border" minlength="6" placeholder="nama asal sekolah" required>
					</td>
				</tr>
				<tr>
					<td>
						Alamat asal sekolah
					</td>
					<td>
						<textarea class="w3-input w3-border" name="alamat_asal_sekolah" placeholder="Kecamatan, Kabupaten. contoh: Pecangaan, Jepara" minlength="6" required></textarea>
					</td>
				</tr>
				<tr>
					<td>
						Nomor Induk Kependudukan (NIK)
						<br><small>
							<font color=red>*</font><i>NIK dapat dilihat pada Kartu Keluarga</i>
						</small>
					</td>
					<td>
						<input type="number" name="no_nik" minlength="16" maxlength="16" class="w3-input w3-border" placeholder="332002**********" required>
					</td>
				</tr>
				<tr>
					<td>
						Prestasi akademik
						<br><small>
							<font color=red>*</font><i>Pisahkan dengan tanda koma ( , ) atau titik koma ( ; ) jika terdapat lebih dari satu prestasi</i>
						</small>
					</td>
					<td>
						<textarea class="w3-input w3-border" name="pakademik"></textarea>
					</td>
				</tr>
				<tr>
					<td>
						Prestasi Non-akademik
						<br><small>
							<font color=red>*</font><i>Pisahkan dengan tanda koma ( , ) atau titik koma ( ; ) jika terdapat lebih dari satu prestasi</i>
						</small>
					</td>
					<td>
						<textarea class="w3-input w3-border" name="pnonakademik"></textarea>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<?php
						if (isset($_GET['pesan'])) {
							if ($_GET['pesan'] == "salah") {
								echo "<p>Captcha tidak sesuai!!</p>";
							}
						}
						?>
						<table align="center">
							<tr>
								<td>Captcha</td>
								<td><img src="captcha.php" alt="gambar" /> </td>
							</tr>
							<td>Isikan CAPTCHA </td>
							<td><input name="nilaiCaptcha" value="" /></td>
						</table>
					</td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" name="sbmt" value="Selanjutnya" class="w3-btn w3-teal w3-right"></td>
				</tr>
			</table>
		</form>

	<?php
} else {
	if (!empty($_GET['a'])) {
			if ($_GET['a'] == 'step2') {
					//$db->query_result("SELECT * FROM register");
					?>
				<p>Isikan data diri anda dengan benar.</p>
				<form method="post" action="proccess.php?step=2"><br />
					<input type="hidden" name="id_reg" value="<?= base64_decode($_GET['regid']); ?>">
					<table class="w3-table w3-border w3-striped w3-container" style="max-width:90%;margin: 0 auto;box-shadow: 0px 10px 20px #eee">
						<tr>
							<td>Nama lengkap</td>
							<td>
								<input type="text" name="nama_lengkap" placeholder="sesuai ijasah" class="w3-input w3-border" required>
							</td>
						</tr>
						<tr>
							<td>Jenis kelamin</td>
							<td>
								<input type="radio" name="jk" value="L" class="w3-check" checked>Laki-laki |
								<input type="radio" name="jk" value="P" class="w3-check">Perempuan
							</td>
						</tr>
						<tr>
							<td>Tempat lahir</td>
							<td>
								<input type="text" name="tmpt_lahir" value="Jepara" class="w3-input w3-border" required>
							</td>
						</tr>
						<tr>
							<td>Tanggal lahir</td>
							<td>
								<input type="text" name="tgl_lahir" placeholder="1 Januari 2003" class="w3-input w3-border" required>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<div class="w3-row-padding">
									<div class="w3-half">
										<label>RT</label>
										<input class="w3-input w3-border" type="number" placeholder="RT" name="rt" required>
									</div>
									<div class="w3-half">
										<label>RW</label>
										<input class="w3-input w3-border" type="number" placeholder="RW" name="rw" required>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<div class="w3-row-padding">
									<div class="w3-third">
										<label>Kelurahan/Desa</label>
										<input class="w3-input w3-border" type="text" placeholder="Kelurahan" name="desa" required>
									</div>
									<div class="w3-third">
										<label>Kecamatan</label>
										<input class="w3-input w3-border" type="text" placeholder="Kecamatan" name="kecamatan" required>
									</div>
									<div class="w3-third">
										<label>Kabupaten</label>
										<input class="w3-input w3-border" type="text" placeholder="Kabupaten" name="kabupaten" required>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td>Tempat tinggal</td>
							<td>
								<select class="w3-input w3-border" name="tempat_tinggal" required>
									<option value="">- Pilih dimana Anda bertempat tinggal</option>
									<option value="bersama orang tua">Bersama orang tua</option>
									<option value="bersama wali">Bersama wali</option>
									<option value="kos">Kos</option>
									<option value="asrama">Asrama</option>
									<option value="panti asuhan">Panti asuhan</option>
									<option value="pondok pesantren">Pondok pesantren</option>
									<option value="lainnya">Lainnya</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>Moda transportasi</td>
							<td>
								<select class="w3-input w3-border" name="transportasi" required>
									<option ="">- Pilih moda transportasi Anda menuju sekolah</option>
									<option value="Jalan kaki">Jalan kaki</option>
									<option value="Kendaraan pribadi">Kendaraan pribadi</option>
									<option value="Kendaraan umum">Kendaraan umum</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>Nomor Hp.</td>
							<td><input type="number" name="hp" placeholder="dapat menerima sms, boleh nomor milik orang tua atau suadara" maxlength="13" minlength="10" class="w3-input w3-border" required></td>
						</tr>
						<tr>
							<td>Email</td>
							<td><input type="email" name="email" placeholder="your@email.com" class="w3-input w3-border"></td>
						</tr>
						<tr>
							<td>Nama ayah</td>
							<td><input type="text" name="nama_ayah" placeholder="nama ayah" class="w3-input w3-border" required></td>
						</tr>
						<tr>
							<td>Pekerjaan ayah</td>
							<td><input type="text" name="pekerjaan_ayah" placeholder="pekerjaan ayah" class="w3-input w3-border"></td>
						</tr>
						<tr>
							<td>Nama ibu</td>
							<td><input type="text" name="nama_ibu" placeholder="nama ibu" class="w3-input w3-border" required></td>
						</tr>
						<tr>
							<td>Pekerjaan ibu</td>
							<td><input type="text" name="pekerjaan_ibu" placeholder="pekerjaan ibu" class="w3-input w3-border"></td>
						</tr>
						<tr>
							<td>Nama wali</td>
							<td><input type="text" name="nama_wali" placeholder="nama wali" class="w3-input w3-border"></td>
						</tr>
						<tr>
							<td>Pekerjaan wali</td>
							<td><input type="text" name="pekerjaan_wali" placeholder="pekerjaan wali" class="w3-input w3-border"></td>
						</tr>
						<tr>
							<td colspan="2">
								<div class="w3-row-padding">
									<div class="w3-half">
										<label>Anak ke</label>
										<input class="w3-input w3-border" type="number" placeholder="anak ke-" name="anakke">
									</div>
									<div class="w3-half">
										<label> Jumlah saudara</label>
										<input class="w3-input w3-border" type="number" placeholder="jumlah saudara Anda" name="saudara">
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<input type="checkbox" name="setuju1" class="w3-check" required="">Saya menyatakan dengan sesungguhnya bahwa isian data dalam formulir ini adalah benar. Apabila ternyata data tersebut tidak benar / palsu, maka saya bersedia menerima sanksi berupa PEMBATALAN menjadi CALON PESERTA DIDIK SMK Walisongo Pecangaan<br>
								<input type="checkbox" name="setuju1" class="w3-check" required="">Bersedia menyerahkan Fotokopi KARTU KELUARGA (KK) kepada Panitia PPDB SMK Walisongo Pecangaan
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<input type="submit" name="sbmt" value="Selanjutnya" class="w3-btn w3-teal w3-right"></td>
						</tr>
					</table>
				<?php
			} elseif ($_GET['a'] == 'step3') {
				//require 'config/q&a.php';
				?>
					<form method="post" action="proccess.php?step=3"><br />
						<input type="hidden" name="idreg" value="<?= base64_decode($_GET['idreg']); ?>">
						<input type="hidden" name="idsis" value="<?= base64_decode($_GET['idsis']); ?>">
						<table class="w3-table w3-border w3-striped w3-container" style="max-width:90%;margin: 0 auto;box-shadow: 0px 10px 20px #eee">
							<tr>
								<td>NILAI UN SMP/MTs.</td>
								<td>
									<div class="w3-row-padding">
										<div class="w3-quarter">
											<label>Bahasa Indonesia</label>
											<input type="number" name="bindo" class="w3-input w3-border ">
										</div>
										<div class="w3-quarter">
											<label>Bahasa Inggris</label>
											<input type="number" name="bing" class="w3-input w3-border ">
										</div>
										<div class="w3-quarter">
											<label>Matematika</label>
											<input type="number" name="mtk" class="w3-input w3-border ">
										</div>
										<div class="w3-quarter">
											<label>IPA</label>
											<input type="number" name="ipa" class="w3-input w3-border ">
										</div>
									</div>
								</td>
							</tr>

							<tr>
								<td>Apakah anda merokok?</td>
								<td>
									<input type="radio" name="rokok" value="IYA" class="w3-check" required>Iya
									<input type="radio" name="rokok" value="TIDAK" class="w3-check" required>Tidak
								</td>
							</tr>
							<tr>
								<td>Apakah anda bertato?</td>
								<td>
									<input type="radio" name="tato" value="IYA" class="w3-check" required>Iya
									<input type="radio" name="tato" value="TIDAK" class="w3-check" required>Tidak
								</td>
							</tr>
							<tr>
								<td>Apakah anda berkebutuhan khusus?</td>
								<td>
									<input type="radio" name="bk" value="IYA" class="w3-check" required>Iya
									<input type="radio" name="bk" value="TIDAK" class="w3-check" required>Tidak
								</td>
							</tr>
							<tr>
								<td>Apakah anda buta warna?</td>
								<td>
									<input type="radio" name="bw" value="IYA" class="w3-check" required>Iya
									<input type="radio" name="bw" value="TIDAK" class="w3-check" required>Tidak
								</td>
							</tr>
							<tr>
								<td>Darimana Anda mendapatkan informasi tentang SMK Walisongo?</td>
								<td>
									<input type="checkbox" name="info" value="internet" class="w3-check">Internet (Website, Sosmed, dll)<br>
									<input type="checkbox" name="info0" value="media elektronik" class="w3-check">Media Elektronik (Radio, dll)<br>
									<input type="checkbox" name="info1" value="media cetak" class="w3-check">Media Cetak (Koran, Spanduk, Pamflet, dll)<br>
									<input type="checkbox" name="info2" value="sosialisasi" class="w3-check">Sosialisasi oleh Guru SMK Walisongo<br>
									<input type="checkbox" name="info3" value="siswa/alumni" class="w3-check">Siswa/Alumni SMK Walisongo<br>
									<input type="checkbox" name="info4" value="keluarga" class="w3-check">Keluarga<br>
									<input type="checkbox" name="info5" value="lainnya" class="w3-check">Lainnya..
								</td>
							</tr>
							<tr>
								<td>Yang menyarankan Anda untuk mendaftar di SMK Walisongo?</td>
								<td>
									<input type="radio" name="rekom" value="inisiatif sendiri" class="w3-check" required>Inisiatif sendiri<br>
									<input type="radio" name="rekom" value="keluarga" class="w3-check" required>Keluarga / Saudara<br>
									<input type="radio" name="rekom" value="teman" class="w3-check" required>Teman<br>
									<input type="radio" name="rekom" value="alumni SMK" class="w3-check" required>Alumni SMK<br>
									<input type="radio" name="rekom" style="width:24px;height:24px;position:relative;top:6px" id="rad1" value="siswa" class="rad" required>Siswa SMK<br>
									<input type="radio" name="rekom" style="width:24px;height:24px;position:relative;top:6px" id="rad2" value="guru" class="rad" required>Guru SMK
									<div id="nm_siswa" class="kieta" style="display:none;">
										Nama Siswa SMK:
										<input name="nm_siswa" class="w3-input w3-border" placeholder="Nama siswa" type="text" />
									</div>
									<div id="nm_guru" class="kieta" style="display:none;">
										Nama Guru SMK:
										<input name="nm_guru" class="w3-input w3-border" placeholder="Nama guru" type="text" />
									</div>
									<script type="text/javascript">
										$(document).ready(function() {
											$('input[type="radio"]').click(function() {
												var f = $(this).val();
												$("div.kieta").hide();
												$("#nm_" + f).show();
											})
										});
									</script>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<input type="submit" name="sbmt" value="Selanjutnya" class="w3-btn w3-teal w3-right"></td>
							</tr>
						</table>
					<?php
				} elseif ($_GET['a'] == 'done') {
				$getParam = str_rot13(base64_decode($_GET['c']));
				$getStr = explode("|", $getParam);
				$getUser = $getStr[0];
				$getPass = $getStr[1];
				$ids = $getStr[2];
				$idr = $getStr[3];
				$getKet = $db->fetch($db->select('jadwal'));
				?>
						<div class="w3-container">
							<div class="w3-card w3-padding w3-margin w3-center">
								<h1>SELAMAT !</h1>
								<h3>Kamu telah mendaftar sebagai calon peserta didik baru di SMK WALISONGO PECANGAAN JEPARA</h3>
								<!-- <b><i><?= $getKet['keterangan']; ?></i><br> -->

								<font color=red>* Informasi :</font> Download dokumen bukti pendaftaran online di bawah<br /><br />
								</b>
								<a target="_blank" href="w9_pdf.php?e=kartu_ujian&secret=<?= base64_encode($getUser . '|' . $getPass); ?>&ids=<?= $ids; ?>&idr=<?= $idr; ?>" class="w3-btn w3-blue w3-btn-block">DOWNLOAD DOCUMENT</a>
								<!-- 	<small><font color=red>*</font>Tidak perlu di cetak	</small> -->
							</div>
						</div>
					<?php
				}
			}
	}
	?>
</div>