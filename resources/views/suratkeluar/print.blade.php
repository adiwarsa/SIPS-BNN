<!DOCTYPE html>
<html>
<head>
	<title>Surat Keluar</title>
	<style type="text/css">
		table {
			border-style: double;
			border-width: 3px;
			border-color: white;
		}
		table tr .text2 {
			text-align: right;
			font-size: 13px;
		}
		table tr .text {
			text-align: center;
			font-size: 13px;
		}
		table tr td {
			font-size: 13px;
		}

	</style>
</head>
<body>
	<center>
		<table>
			<tr>
				<td style="text-align: center"><img style="display:block; padding-left: 15px;" src="{{ asset('assets/img/elements/logo-bnn-2.png') }}" width="80" height="80">
                    <font size="3"><b>PROVINSI BALI</b></font></td>
                <td>
				
					<font size="5"><b>BADAN NARKOTIKA NASIONAL PROVINSI BALI</b></font><br>
                    <font size="3">JALAN KAMBOJA NO. 8 DENPASAR</font><br>
					<font size="3">TELP        : (0361) 232472, 7800179, 263860</font><br>
                    <font size="3">FAX         : (0361) 232472</font><br>
                    <font size="3">EMAIL       : bnnp_bali@bnn.go.id</font><br>
                    
                </td>
			</tr>
			<tr>
				<td colspan="2"><hr style="border:1px solid"></td>
			</tr>
		<table width="625">
			<tr>
				<td class="text2"><b>{{ $surat->formatted_tanggal_surat }}</b></td>
			</tr>
		</table>
		</table>
		<table>
			<tr class="text2">
				<td><b>Nomor</b></td>
				<td width="564">: <b>{{$surat->no_surat}}</b></td>
			</tr>
            <tr>
				
				<td><b>Sifat</b></td>
				@if ($surat->sifat == 1)
				<td width="564">: <b>Tetap</b></td>
				@else
				<td width="564">: <b>Biasa</b></td>
				@endif
			</tr>
			<tr>
				<td><b>Hal</b></td>
				<td width="564">: <b>{{ ucfirst($surat->hal) }}</b></td>
			</tr>
		</table>
		<br>
		<table width="625">
			<tr>
		       <td>
			       <font size="2">Kpd Yth:<br>{{ ucfirst($surat->kepada) }}<br>Di tempat</font>
		       </td>
		    </tr>
		</table>
		<br>
		@if($surat->kategori == 'Undangan')
        <table width="625">
			<tr>
		       <td style="text-align:justify">
			       <font size="2"><strong>1.</strong><a style="padding-left: 10px;">Rujukan</a> :
                   <br>
                   <p style="padding-left: 30px; margin: 0;">a. Undang—undang Nomor : 35 Tahun 2009 tentang Narkotika.</p>
                   <p style="padding-left: 30px; margin: 0;">b. Peraturan Presiden Nomor 47 Tahun 2019 tentang Perubahan Atas Peraturan Presiden Nomor 23 Tahun 2010 tentang Badan Narkotika Nasional Repub!ik Indonesia.</p>
                   <p style="padding-left: 30px; margin: 0;">c. Intruksi Presiden Nomor 2 Tahun 2020 tenîang Rencana Aksi Nasional Pencegahan dan Pemberantasan Penyalahgunaan dan Peredaran Gelap Narkotika dan Prekursor
					Narkotika Tahun 2020-20024.</p>
                   <p style="padding-left: 30px; margin: 0;">d. DIPA Badan Narkotika Nasional Provinsi Bali Tahun Anggaran 2023. Nomor : SP 066.01.2.682516/2023 tanggai 30 Nepember 2022.</p>
                    </font>
		       </td>
		    </tr>
		</table>
        <table width="625">
			<tr>
		       <td style="text-align:justify">
			       <font size="2"><strong>2.</strong><span style="padding-left: 10px;">{{ $surat->isi }}</span>
                   
                    </font>
		       </td>
		    </tr>
            <table style="padding-left: 60px;">
                <tr class="text2">
                    <td><strong>Hari Tanggal</strong></td>
                    <td width="541">: {{ $surat->formatted_tanggal_pelaksanaan }}</td>
                </tr>
                <tr>
                    <td><strong>Jam</strong></td>
					@if($surat->selesai)
                    <td width="525">: {{ $surat->formatted_mulai }} s.d {{ $surat->formatted_selesai }}</td>
					@else
					<td width="525">: {{ $surat->formatted_mulai }} s.d Selesai</td>
					@endif
				</tr>
                <tr>
                    <td><strong>Tempat</strong></td>
                    <td width="525">: {{ $surat->tempat }}</td>
                </tr>
            </table>
		</table>
		<table width="625">
			<tr>
		       <td style="text-align:justify">
			       <font size="2"><strong>3.</strong><span style="padding-left: 10px;">Sehubungan dengan point diatas, berkenan Bapak {{ ucfirst($surat->kepada) }} dapat hadir sebagai {{ $surat->sebagai }} dengan topik ({{ $surat->topik }}) dengan menyertakan surat tugas.</span>
                   
                    </font>
		       </td>
		    </tr>
            <table width="625">
                <tr>
                   <td style="text-align:justify">
                       <font size="2"><strong>4.</strong><span style="padding-left: 10px;">Demikian untuk menjadi maklum dan terima kasih atas partisipasinya.</span>
                       
                        </font>
                   </td>
                </tr>
            </table>
		<br>
		</table>
		<br>
		<br>
		@endif
		@if($surat->kategori == 'Lain')
		<table width="625">
			<tr>
		       <td style="text-align:justify">
			       <font size="2"><strong>1.</strong><a style="padding-left: 10px;">Rujukan</a> :
                   <br>
				   <p style="padding-left: 30px; margin: 0;">
					@php $letters = ['a.', 'b.', 'c.', 'd.', 'e.']; $i = 0; @endphp
					@foreach(explode("\n", $surat->menimbang) as $line)
						<strong>{!! $letters[$i++] !!}</strong>
						<span style="margin-left: 5px;">{!! trim($line) !!}</span>
					@endforeach
				</p>
                    </font>
		       </td>
		    </tr>
		</table>
        <table width="625">
			<tr>
		       <td style="text-align:justify">
			       <font size="2"><strong>2.</strong><span style="padding-left: 10px;">{{ $surat->isilain }}</span>
                   
                    </font>
		       </td>
		    </tr>
		</table>
        <table width="625">
			<tr>
		       <td style="text-align:justify">
			       <font size="2"><strong>3.</strong><span style="padding-left: 10px;">{{ $surat->kesimpulan }}</span>
                   
                    </font>
		       </td>
		    </tr>
		</table>
		<br>
		<br>
		@endif
		<table width="625">
			<tr>
				<td width="430"><br><br><br><br></td>
				<td class="text" align="center">Kepala Badan Narkotika Nasional<br>Provinsi Bali<br><br><br><br>Brigjen. Pol. Dr. R. Nurhadi Yuwono, S.I.K., M.Si., CHRMP<br>Brigadir Jendral Polisi</td>
			</tr>
	     </table>
	</center>
</body>
</html>
<script>
        window.print();
        // window.onafterprint = back;
        // window.onbeforeprint = back;
        var beforePrint = function() {
            console.log('Functionality to run before printing.');
        };

        var afterPrint = function() {
            window.history.back();
        };

        if (window.matchMedia) {
            var mediaQueryList = window.matchMedia('print');
            mediaQueryList.addListener(function(mql) {
                if (mql.matches) {
                    beforePrint();
                } else {
                    afterPrint();
                }
            });
        }

        window.onbeforeprint = beforePrint;
        window.onafterprint = afterPrint;
   
</script>