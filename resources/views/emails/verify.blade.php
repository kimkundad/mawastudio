<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href="../../"/>
		<title>ใบแจ้งชำระเงิน</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--begin::Fonts(mandatory for all pages)-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
		<link href="{{ url('admin/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ url('admin/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="app-blank app-blank">
        <div class="d-flex flex-column flex-root" id="kt_app_root">
			<!--begin::Wrapper-->
			<div class="d-flex flex-column flex-column-fluid">
				
				<!--begin::Body-->
				<div class="scroll-y flex-column-fluid px-10 py-10" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_header_nav" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true" style="background-color:#D5D9E2; --kt-scrollbar-color: #d9d0cc; --kt-scrollbar-hover-color: #d9d0cc">
					<!--begin::Email template-->
					<style>html,body { padding:0; margin:0; font-family: Inter, Helvetica, "sans-serif"; } a:hover { color: #009ef7; }</style>
					<div id="#kt_app_body_content" style="background-color:#D5D9E2; font-family:Arial,Helvetica,sans-serif; line-height: 1.5; min-height: 100%; font-weight: normal; font-size: 15px; color: #2F3044; margin:0; padding:0; width:100%;">
						<div style="background-color:#ffffff; padding: 45px 0 34px 0; border-radius: 24px; margin:40px auto; max-width: 600px;">
							<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" height="auto" style="border-collapse:collapse">
								<tbody>
									<tr>
										<td align="center" valign="center" style="text-align:center; padding-bottom: 10px">
											<!--begin:Email content-->
											<div style="margin-bottom:55px; text-align:left">
												<!--begin:Logo-->
												<div style="margin:-10px 60px 20px 60px; text-align:center;">
													<a href="#" rel="noopener" target="_blank">
														<img alt="Logo" src="{{ url('img/Logo_new_v1.png') }}" style="height: 45px" />
													</a>
												</div>
												<!--end:Logo-->
												<!--begin:Text-->
												<div style="font-size: 14px; text-align:center; font-weight: 500; margin:0 60px 36px 60px; font-family:Arial,Helvetica,sans-serif">
													<p style="color:#181C32; font-size: 28px; font-weight:700; line-height:1.4; margin-bottom:6px">มูลนิธิบ้านพระพร</p>
													<p style="margin-bottom:2px; color:#3F4254; line-height:1.6">
                                                    <b>คอนเสิร์ตการกุศล</b><br> เพื่อหารายได้ช่วยเหลือมูลนิธิบ้านพระพรโดยไม่หักค่าใช้จ่าย
                                                    </p>
												</div>
												<!--end:Text-->
												<!--begin:Items-->
												<div style="display: flex; justify-content:center; flex-wrap: wrap; margin:0 40px 42px 40px">

													@if($details['seasts'])
													@for ($i = 0; $i < count($details['seasts']); $i++)
													<!--begin:Item-->
													<div style="width:220px; margin:18px 20px">
														<!--begin:Media-->
														<img src="{!!$message->embedData(QrCode::format('png')->size(220)->generate('https://admin.mawastudiothailand.com/admin/verify_checkin?orderid='.$details['order_id'].'&seasts='.$details['seasts'][$i]), 'QrCode.png', 'image/png')!!}">
														<!--end:Media-->
														<!--begin:Text-->
														<a href="#" style="color:#181C32; font-size: 14px; font-weight:600; display:block; margin-bottom:9px">ที่นั่ง {{$details['seasts'][$i]}}</a>
														<!--begin:Text-->
													</div>
													<!--end:Item-->
													@endfor
													@endif
													
													
												</div>
												<!--end:Items-->
												<!--begin:Text-->
												<div style="font-size:14px; text-align:left; font-weight:500; margin:0 60px 33px 60px; font-family:Arial,Helvetica,sans-serif">
													<p style="color:#181C32; font-size: 18px; font-weight:600; margin-bottom:27px">สวัสดี {{$details['name']}},</p>
													<p style="color:#3F4254; line-height:1.6">Lots of people make mistakes while
													<a href="#" style="font-family:Arial,Helvetica,sans-serif margin-right:3px">creating paragraphs.</a>Some writers just put whitespace in their text in random places for aesthetic purposes but don’t think about the coherence and structure of the text. In many cases, the
													<a href="#" style="font-family:Arial,Helvetica,sans-serif; margin-right:3px">coherence within paragraphs</a>and between paragraphs remains unclear. These kinds of mistakes can mess up the structure of your articles.</p>
												</div>
												<!--end:Text-->
											</div>
											<!--end:Email content-->
										</td>
									</tr>
									<tr>
										<td align="center" valign="center" style="font-size: 13px; text-align:center; padding: 0 10px 10px 10px; font-weight: 500; color: #A1A5B7; font-family:Arial,Helvetica,sans-serif">
											<p style="color:#181C32; font-size: 16px; font-weight: 600; margin-bottom:9px">Customer Support</p>
											<p style="margin-bottom:2px">โทรติดต่อหมายเลขฝ่ายดูแลลูกค้าของเรา: <a href="#" style="font-weight: 600">062-5932224</a></p>
											<p style="margin-bottom:4px">E-mail
											<a href="#" rel="noopener" target="_blank" style="font-weight: 600">pop@eventpop.me</a>.</p>
                                            <p style="margin-bottom:4px">Line@
                                                <a href="#" rel="noopener" target="_blank" style="font-weight: 600">@eventpop</a>.</p>
											<p>ทุกวันจันทร์-ศุกร์ 10:00 - 18:00 น. (ยกเว้นวันเสาร์-อาทิตย์และวันหยุดนักขัตฤกษ์)</p>
										</td>
									</tr>
									<tr>
										<td align="center" valign="center" style="text-align:center; padding-bottom: 20px;">
											<a href="#" style="margin-right:10px">
												<img alt="Logo" src="{{ url('admin/assets/media/email/icon-linkedin.svg') }}" style="height:24px" />
											</a>
											<a href="#" style="margin-right:10px">
												<img alt="Logo" src="{{ url('admin/assets/media/email/icon-dribbble.svg') }}" style="height:24px"/>
											</a>
											<a href="#" style="margin-right:10px">
												<img alt="Logo" src="{{ url('admin/assets/media/email/icon-facebook.svg') }}" style="height:24px"/>
											</a>
											<a href="#">
												<img alt="Logo" src="{{ url('admin/assets/media/email/icon-twitter.svg') }}" style="height:24px"/>
											</a>
										</td>
									</tr>
									<tr>
										<td align="center" valign="center" style="font-size: 13px; padding:0 15px; text-align:center; font-weight: 500; color: #A1A5B7;font-family:Arial,Helvetica,sans-serif">
											<p>&copy; Copyright mawastudiothailand.
											</p>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<!--end::Email template-->
				</div>
				<!--end::Body-->
			</div>
			<!--end::Wrapper-->
		</div>
    </body>
	<!--end::Body-->
</html>