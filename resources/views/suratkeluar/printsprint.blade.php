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
				<td style="text-align: center"><img style="display:block;" src="{{ asset('assets/img/elements/bnn.png') }}" width="150" height="90">
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
            <table class="mt-2" width="625">
                <tr>
                    <td style="text-align: center; text-decoration: underline;" class="text2"><b>SURAT PERINTAH</b></td>
                </tr>
                <tr>
                    <td style="text-align: center"><b>NOMOR : {{ $surat->no_surat }}</b></td>
                </tr>
            </table>
		</table>
        <table width="625">
			<tr>
                <tr>
                    <td width="60" style="vertical-align:top;">Menimbang</td>
                    <td width="10"style="vertical-align:top; padding-left: 10px;"> : </td>
                    <td style="text-align:justify; padding-left: 5px;">{!! trim($surat->menimbang) !!}
                    </td>
                </tr>
                <tr>
                    <td><br></td>
                </tr>
                <tr>
                    <td width="50"style="vertical-align:top;">Dasar</td>
                    <td width="10"style="vertical-align:top; padding-left: 10px;"> : </td>
                    @if ($surat->dasar == '')
                    <td style="text-align:justify; padding-left: 5px;" >1. Undang-Undang Nomor 35 Tahun 2009 tentang Narkotika ;
                        <br>
                        2. Peraturan Presiden Nomor 47 Tahun 2019 tentang Badan Narkotika Nasional;
                    </td>
                    @else
                    <td style="text-align:justify; padding-left: 5px;" >1. Undang-Undang Nomor 35 Tahun 2009 tentang Narkotika ;
                        <br>
                        2. Peraturan Presiden Nomor 47 Tahun 2019 tentang Badan Narkotika Nasional;
                        <br>
                        <p style="padding-left: -5px; margin: 0;">
                            @php $letters = ['3.', '4.', '5.', '6.', '7.']; $i = 0; @endphp
                            @foreach(explode("\n", $surat->dasar) as $line)
                                {!! $letters[$i++] !!}
                                <span>{!! trim($line) !!}</span>
                            @endforeach
                        </p>
                    </td>
                    @endif
                </tr>
		    </tr>
            <tr>
                <td><br></td>
            </tr>
            
		</table>
            <table class="mt-2" width="625">
                <tr>
                    <td style="text-align: center; text-decoration: underline;" class="text2"><b>MEMERINTAHKAN</b></td>
                </tr>
            </table>

            <table width="625">
                <tr>
                    <tr>
                        <td width="70" style="vertical-align:top; ">Kepada</td>
                        <td style="vertical-align:top;"> : </td>
                        @foreach ($surat->suratkepada as $key => $kepada)
                            @if($key % 2 == 0)
                                <td style="text-align:justify;">
                                    {{ $key + 1 }}. <span style="text-decoration: underline;">{{ $kepada->pegawai->nama }}</span>
                                    <br>
                                    @if($kepada->pegawai->status == 'ASN')
                                        <span style="text-decoration: underline; padding-left: 13px;">{{ $kepada->pegawai->nip }}</span>
                                        <br>
                                    @endif
                                    <span style="padding-left: 13px;">{{ $kepada->pegawai->jabatan }}</span>
                                </td>
                            @else
                                <td style="text-align:justify;">
                                    {{ $key + 1 }}. <span style="text-decoration: underline;">{{ $kepada->pegawai->nama }}</span>
                                    <br>
                                    @if($kepada->pegawai->status == 'ASN')
                                        <span style="text-decoration: underline; padding-left: 13px;">{{ $kepada->pegawai->nip }}</span>
                                        <br>
                                    @endif
                                    <span style="padding-left: 13px;">{{ $kepada->pegawai->jabatan }}</span>
                                </td>
                                </tr>
                                <tr>
                                <td></td>
                                <td></td>
                            @endif
                        @endforeach
                        @if(count($surat->suratkepada) % 2 != 0)
                            <td></td>
                        @endif
                    </tr>
                </tr>
            </table>
		<br>

        <table width="625">
			<tr>
                <tr>
                    <td width="50"style="vertical-align:top;">Untuk</td>
                    <td width="10"style="vertical-align:top; padding-left: 10px;"> : </td>
                    <td style=" text-align:justify; padding-left: 5px;">
                        <p style="padding-left: 0px; margin: 0;">
                            @php $letters = ['1.', '2.', '3.', '4.', '5.']; $i = 0; @endphp
                            @foreach(explode("\n", $surat->untuk) as $line)
                                {!! $letters[$i++] !!}
                                <span style="margin-left: 5px;">{!! trim($line) !!}</span>
                            @endforeach
                        </p>
                    </td>
                </tr>
		    </tr>
		</table>
		<br>
		<br>
        <br>
		<br>
        <br>
		<br>
		<table width="625">
            <tr>
                <tr>
                    <td width="500" class="text-center" align="right">Dikeluarkan
                    </td>
                    <td class="text-center" align="right">: 
                    </td>
                    <td class="text-center" align="left"> Denpasar
                    </td>
                </tr>
				<td width="400" class="text-center" align="right">Pada Tanggal 
                </td>
                <td class="text-center" align="left"> : 
                </td>
                <td width="120" class="text-center" align="left"> {{ $surat->formatted_tanggal_surat }}
                </td>
			</tr>
        </table>
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