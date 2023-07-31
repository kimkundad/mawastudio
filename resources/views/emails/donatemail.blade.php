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
														<img alt="Logo" src="{{ url('img/Logo_new_v1.png') }}" style="height: 55px" />
													</a>
												</div>
												<!--end:Logo-->
												<!--begin:Text-->
												<div style="font-size: 14px; text-align:center; font-weight: 500; margin:0 60px 36px 60px; font-family:Arial,Helvetica,sans-serif">
													<p style="color:#707070; font-size: 28px; font-weight:700; line-height:1.4; margin-bottom:6px">บริจาคสำเร็จ</p>
												</div>
												<div style="margin-bottom: 15px">
													<img alt="Logo" src="{{ url('img/165751.png') }}" style="width: 100%;" />
												</div>
												<!--end:Text-->
												<!--begin:Text-->
                                                <div style="font-size: 14px; text-align:center; font-weight: 500; margin:0 60px 36px 60px; font-family:Arial,Helvetica,sans-serif">
													<p style="margin-bottom:2px;font-weight:700; font-size: 24px;  color:#707070; line-height:1.6">
                                                    <b>มูลนิธิบ้านพระพร <br>ขอขอบคุณ คูณ {{$details['name']}}
                                                    </p>
													<p style="font-weight:700; font-size: 18px;  color:#707070;">
                                                        ที่ร่วมเป็นส่วนหนึ่งในการช่วยเหลือ ผู้ต้องขัง ผู้พ้นโทษ เยาวชนและเด็ก ๆ ด้อยโอกาสทุกคน เพื่อให้เข้าถึงชีวิตแห่งการเปลี่ยนแปลงที่ดีขึ้น
													</p>
												</div>
												<!--end:Text-->
											</div>
											<!--end:Email content-->
										</td>
									</tr>
									<tr>
										<td align="center" valign="center" style="font-size: 13px; text-align:center; padding: 0 10px 10px 10px; font-weight: 500; color: #A1A5B7; font-family:Arial,Helvetica,sans-serif">
											
											<img src="{{ url('img/154930.png') }}" style="width:90%; margin-bottom: 20px; margin-top: 20px;">
											<p style="color:#181C32; font-size: 16px; font-weight: 600; margin-bottom:9px">Customer Support</p>
											<p>หากมีข้อสงสัยเพิ่มเติมหรือต้องการความช่วยเหลือ ติดต่อ <br> วันจันทร์-อาทิตย์ หยุดวันเสาร์ 10:00 – 18:00 น.</p>
											<p style="margin-bottom:4px">Facebook Page
											<a href="https://www.facebook.com/hobf.thailand2" rel="noopener" target="_blank" style="font-weight: 600">Second chance</a>.</p>
                                            <p style="margin-bottom:4px">Line@
                                                <a href="https://lin.ee/dMesavY" rel="noopener" target="_blank" style="font-weight: 600">https://lin.ee/dMesavY</a>
											</p>
											
										</td>
									</tr>
									<tr>
										<td align="center" valign="center" style="text-align:center; padding-bottom: 20px;">
												<div style="margin-bottom: 10px">
													<a href="#" rel="noopener" target="_blank">
														<img alt="line" src="{{ url('img/Image_29.png') }}" style="height: 160px; width:160px" />
													</a>
												</div>
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