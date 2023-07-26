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
		<!--begin::Theme mode setup on page load-->
		<!--end::Theme mode setup on page load-->
		<!--begin::Root-->
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
											<div style="text-align:center; margin:0 15px 34px 15px">
												<!--begin:Logo-->
												<div style="margin-bottom: 10px">
													<a href="#" rel="noopener" target="_blank">
														<img alt="Logo" src="{{ url('img/logo_v1.png') }}" style="height: 45px" />
													</a>
												</div>
												<!--end:Logo-->
												<!--begin:Media-->
												<div style="margin-bottom: 15px">
													<img alt="Logo" src="{{ url('admin/assets/media/email/icon-positive-vote-1.svg') }}" />
												</div>
												<!--end:Media-->
												<!--begin:Text-->
												<div style="font-size: 14px; font-weight: 500; margin-bottom: 27px; font-family:Arial,Helvetica,sans-serif;">
													<p style="margin-bottom:9px; color:#181C32; font-size: 20px; font-weight:700">สวัสดี {{$details['name']}}</p>
													<p style="margin-bottom:2px; color:#7E8299">เราขอขอบคุณที่ให้ความสนใจเข้าร่วมกิจกรรม</p>
													<p style="margin-bottom:2px; color:#7E8299">สำหรับผู้ที่สมัครและได้รับอีเมลยืนยันจากเรา</p>
													<p style="margin-bottom:2px; color:#7E8299">คุณสามารถชำระค่า.......บลาๆๆ</p>
												</div>

                                                <div style="margin-bottom: 15px">
													<img alt="Logo" src="{{ url('img/S__5562374.jpg') }}" style="max-height: 400px; width: auto" />
												</div>
												<!--end:Text-->
												<!--begin:Action-->
												<a href='http://localhost:3000/paymentNoti?ordercon={{$details['order_id']}}' target="_blank" 
                                                style="background-color:#50cd89; border-radius:6px;display:inline-block; padding:11px 19px; color: #FFFFFF; font-size: 14px; font-weight:500;">
                                                    แจ้งการชำระเงิน
                                                </a>
												<!--begin:Action-->
											</div>
											<!--end:Email content-->
										</td>
									</tr>
                                    <tr>
										<td align="center" valign="center" style="text-align:center; padding-bottom: 10px">
											<!--begin:Email content-->
											<div style="text-align:center; margin:0 60px 34px 60px">
												<!--begin:Order-->
												<div style="margin-bottom: 15px">
													<!--begin:Title-->
													<h3 style="text-align:left; color:#181C32; font-size: 18px; font-weight:600; margin-bottom: 22px">สรุปการสั่งจอง</h3>
													<!--end:Title-->
													<!--begin:Items-->
													<div style="padding-bottom:9px">
														<!--begin:Item-->
														<div style="display:flex; justify-content: space-between; color:#7E8299; font-size: 14px; font-weight:500; margin-bottom:8px">
															<!--begin:Description-->
															<div style="font-family:Arial,Helvetica,sans-serif">Business - Monthly invoice</div>
															<!--end:Description-->
															<!--begin:Total-->
															<div style="font-family:Arial,Helvetica,sans-serif">฿{{$details['price']}}</div>
															<!--end:Total-->
														</div>
														<!--end:Item-->
														<!--end:Item-->
														<!--begin::Separator-->
														<div class="separator separator-dashed" style="margin:15px 0"></div>
														<!--end::Separator-->
														<!--begin:Item-->
														<div style="display:flex; justify-content: space-between; color:#7E8299; font-size: 14px; font-weight:500">
															<!--begin:Description-->
															<div style="font-family:Arial,Helvetica,sans-serif">Total paid</div>
															<!--end:Description-->
															<!--begin:Total-->
															<div style="color:#50cd89; font-weight:700; font-family:Arial,Helvetica,sans-serif">฿{{$details['price']}}</div>
															<!--end:Total-->
														</div>
														<!--end:Item-->
													</div>
													<!--end:Items-->
												</div>
												<!--end:Order-->
												
											</div>
											<!--end:Email content-->
										</td>
									</tr>
									<tr style="display: flex; justify-content: center; margin:0 60px 35px 60px">
										<td align="start" valign="start" style="padding-bottom: 10px;">
											<p style="color:#181C32; font-size: 18px; font-weight: 600; margin-bottom:13px">ขั้นตอนการชำระเงิน</p>
											<!--begin::Wrapper-->
											<div style="background: #F9F9F9; border-radius: 12px; padding:35px 30px">
												<!--begin::Item-->
												<div style="display:flex">
													<!--begin::Media-->
													<div style="display: flex; justify-content: center; align-items: center; width:40px; height:40px; margin-right:13px">
														<img alt="Logo" src="{{ url('admin/assets/media/email/icon-polygon.svg') }}" />
														<span style="position: absolute; color:#50CD89; font-size: 16px; font-weight: 600;">1</span>
													</div>
													<!--end::Media-->
													<!--begin::Block-->
													<div>
														<!--begin::Content-->
														<div>
															<!--begin::Title-->
															<a href="#" style="color:#181C32; font-size: 14px; font-weight: 600;font-family:Arial,Helvetica,sans-serif">การแจ้งชำระเงินผ่านเว็บไซต์</a>
															<!--end::Title-->
															<!--begin::Desc-->
															<p style="color:#5E6278; font-size: 13px; font-weight: 500; padding-top:3px; margin:0;font-family:Arial,Helvetica,sans-serif">กดปุ่มสีแดง "แจ้งการชำระเงิน" จากนั้นกรอก หมายเลขคำสั่งจอง และ แนบสลิปชำระเงิน รอเจ้าหน้าที่ตรวจสอบ</p>
															<!--end::Desc-->
														</div>
														<!--end::Content-->
														<!--begin::Separator-->
														<div class="separator separator-dashed" style="margin:17px 0 15px 0"></div>
														<!--end::Separator-->
													</div>
													<!--end::Block-->
												</div>
												<!--end::Item-->
												<!--begin::Item-->
												<div style="display:flex">
													<!--begin::Media-->
													<div style="display: flex; justify-content: center; align-items: center; width:40px; height:40px; margin-right:13px">
														<img alt="Logo" src="{{ url('admin/assets/media/email/icon-polygon.svg') }}" />
														<span style="position: absolute; color:#50CD89; font-size: 16px; font-weight: 600;">2</span>
													</div>
													<!--end::Media-->
													<!--begin::Block-->
													<div>
														<!--begin::Content-->
														<div>
															<!--begin::Title-->
															<a href="#" style="color:#181C32; font-size: 14px; font-weight: 600;font-family:Arial,Helvetica,sans-serif">การแจ้งชำระเงินผ่าน Line</a>
															<!--end::Title-->
															<!--begin::Desc-->
															<p style="color:#5E6278; font-size: 13px; font-weight: 500; padding-top:3px; margin:0;font-family:Arial,Helvetica,sans-serif">
                                                                เพิ่มเพื่อนผ่านไลน์  <a class='text-success'>@eventpop</a> จากนั้นแจ้ง หมายเลขคำสั่งจอง และ แนบสลิปชำระเงิน รอเจ้าหน้าที่ตรวจสอบ
                                                            </p>
															<!--end::Desc-->
														</div>
														<!--end::Content-->
														<!--begin::Separator-->
														<div class="separator separator-dashed" style="margin:17px 0 15px 0"></div>
														<!--end::Separator-->
													</div>
													<!--end::Block-->
												</div>
												<!--end::Item-->
												<!--begin::Item-->
												<div style="display:flex">
													<!--begin::Media-->
													<div style="display: flex; justify-content: center; align-items: center; width:40px; height:40px; margin-right:13px">
														<img alt="Logo" src="{{ url('admin/assets/media/email/icon-polygon.svg') }}" />
														<span style="position: absolute; color:#50CD89; font-size: 16px; font-weight: 600;">3</span>
													</div>
													<!--end::Media-->
													<!--begin::Block-->
													<div>
														<!--begin::Content-->
														<div>
															<!--begin::Title-->
															<a href="#" style="color:#181C32; font-size: 14px; font-weight: 600;font-family:Arial,Helvetica,sans-serif">ตรวจสอบข้อมูลสำเร็จ</a>
															<!--end::Title-->
															<!--begin::Desc-->
															<p style="color:#5E6278; font-size: 13px; font-weight: 500; padding-top:3px; margin:0;font-family:Arial,Helvetica,sans-serif">
                                                                เมื่อเจ้าหน้าที่ตรวจสอบแล้ว เราจะทำการส่ง QR Code และข้อมูลการเข้าร่วมงานให้กับทางอีเมลของท่าน ในวันร่วมงานให้นำ QR Code มาเช็คอินเข้างานและร่วมกิจกรรมสนุกๆกับทางเรา
                                                            </p>
															<!--end::Desc-->
														</div>
														<!--end::Content-->
													</div>
													<!--end::Block-->
												</div>
												<!--end::Item-->
											</div>
											<!--end::Wrapper-->
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
												<img alt="Logo" src="{{ url('admin/assets/media/email/icon-linkedin.svg') }}" />
											</a>
											<a href="#" style="margin-right:10px">
												<img alt="Logo" src="{{ url('admin/assets/media/email/icon-dribbble.svg') }}" />
											</a>
											<a href="#" style="margin-right:10px">
												<img alt="Logo" src="{{ url('admin/assets/media/email/icon-facebook.svg') }}" />
											</a>
											<a href="#">
												<img alt="Logo" src="{{ url('admin/assets/media/email/icon-twitter.svg') }}" />
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