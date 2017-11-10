$(document).ready(function(){

	var courses = {

		it : { title : "BS in Information Technology", description : "The Bachelor of Science in Information Technology (BSIT) program prepares students to be IT professionals who are able to perform installation, operation, development, maintenance and administration of computer applications. The goal of the program is togear up students as &ldquo;information technologists&rdquo; who can assist individuals and organizations in solving problems using information technology (IT) techniques." },
		act : { title : "Associate in Computer Technology (2 years)", description : "The&nbsp;<strong>Associate in Computer Technology program (ACT)</strong>&nbsp;provides knowledge and skills in the fundamental of computer programming and basic computation. The program also includes topics related to data structures, network concepts, computer organization, database management system and system analysis and design. It aims to promote analytical, critical thinking, software troubleshooting and programming skills."},
		blis : { title : "BS in Library and Information System", description : "The <strong>Bachelor of Library and Information Science program (BLIS)</strong> is designed to provide students with knowledge and skills on the theories and concepts of the provision of library and information services. It includes topics on the basic principles of and fundamental laws of library science."},
		psy : {title : "BS in Psychology", description : "The <strong>Bachelor of Science in Psychology program (BSP)</strong> is designed to help you observe human behavior through the scientific method, allowing you to gain access to the human psyche and fathom its depths. You will gain the knowledge, tools and skills needed to assess and conduct empirical research regarding individual and group behavior though the lens of various psychological theories and concepts. The BSP degree can prepare you for general careers in teaching, research, counseling and human resources. It can also be a foundation major for further studies in the fields of Medicine, Guidance and Counseling, Human Resource Development and Law. "},
		crim : {title : "BS in Criminology", description : "The&nbsp;<strong>Bachelor of Science in Criminology</strong>&nbsp;or Criminal Justice is a a 4-year college degree program intended for individuals who wish to have a career in the fields of law enforcement, security administration, crime detection and prevention or correctional administration."},
		eeduc : {title : "BS in Elementary Education", description : "<strong>Bachelor of Elementary Education (BEED)</strong>&nbsp;is a four year degree program designed to prepare students to become primary school teachers. The program combines both theory and practice in order to teach students the necessary knowledge and skills a primary school teacher needs. There are several major fields of concentration in the BEED program, namely Early Childhood Education, Special Education, General Education, English, Mathematics, Science, Filipino, Social Studies Music, Arts and Physical Education (MAPE) and Technology and Home Economics (THE)."},
		seduc : {title : "BS in Secondary Education", description : "Bachelor of Secondary Education (BSED) is a four year degree program designed to prepare students for becoming high school teachers. The program combines both theory and practice in order to teach students the necessary knowledge and skills a high school teacher needs. The BSEd program trains students to teach one of the different learning areas such as English, Mathematics, General Science, Filipino, Social Studies, Biological Sciences, Physics, Chemistry, Music, Arts, Physical Education and Health (MAPEH) and Home Economics and Livelihood Education.<br />Subjects and Curriculum"},
		bus : {title : "BS in Business Administration", description : "The&nbsp;<strong>BSBA in Marketing Management</strong>&nbsp;program is designed to equip you with the knowledge and skills for effective marketing and sales strategies: how a company determines what product or service to sell, how customers and markets are delineated into target demographics, and the methods of reaching them. The course also focuses on strategic marketing issues which marketing managers assess before findings are presented to their executives. By learning to be an effective marketer and manager, you will learn to respond to the demands of competitors, the government, and larger social issues. Among the concepts and theories that will be discussed are sales management, brand, distribution, e-commerce, franchising, retailing, information technology and corporate social responsibility."},
		eng : {title : "BS in Computer Engineering", description: "The&nbsp;<strong>Bachelor of Science in Computer Engineering(BSCpE)</strong>&nbsp;program is a combination of electrical engineering and computer science. Its curriculum provides students with a foundation in basic science, mathematics, software and engineering."},
		oa : {title : "BS in Office Administration", description: "Bachelor of Science in Office Administration (BSOA) is a four year degree program designed to provide students with knowledge and skills in business management and office processes needed in different workplaces such as general business offices, legal or medical offices"},
		hrm : {title : "BS in Hotel and Restaurant Management", description: "The Bachelor of Science in Hotel and Restaurant Management (BSHRM) program is geared towards equipping students with the necessary knowledge, skills and attitude to provide quality service in the hospitality industry. The program contains subjects that will address the needs of different sectors in the hospitality industry, such as culinary, front office, tourism, resort and hotel operations. Its primary concentration is on the development of practical and management skills which are achieved through the combination of theoretical classes, practicum exercises and experiential learning."},

		//SHS

		abm : { title: "Accounting and Business Management", description: "The Accountancy, Business and Management (ABM) strand would focus on the basic concepts of financial management, business management, corporate operations, and all things that are accounted for. ABM can also lead you to careers on management and accounting which could be sales manager, human resources, marketing director, project officer, bookkeeper, accounting clerk, internal auditor, and a lot more."},
		gas : {title: "General Academic Strand", description: "While the other strands are career-specific, the General Academic Strand is great for students who are still undecided on which track to take. You can choose electives from the different academic strands under this track. These subjects include Humanities, Social Sciences, Applied Economics, Organization and Management, and Disaster Preparedness."},
		humss: {title: "Humanities and Social Sciences", description: "The HUMMS strand is designed for those who wonder what is on the other side of the wall. In other words, you are ready to take on the world and talk to a lot of people. This is for those who are considering taking up journalism, communication arts, liberal arts, education, and other social science-related courses in college. <br/> If you take this strand, you could be looking forward to becoming a teacher, a psychologist, a lawyer, a writer, a social worker, or a reporter someday. This strand focuses on improving your communication skills. "},
		stem: {title: "Science, Technology, Engineering and Mathematics", description: "Science, Technology, Engineering, and Mathematics are intertwining disciplines when applied in the real world. The difference of the STEM curriculum with the other strands and tracks is the focus on advanced concepts and topics.<br>Under the track, you can become a pilot, an architect, an astrophysicist, a biologist, a chemist, an engineer, a dentist, a nutritionist, a nurse, a doctor, and a lot more. Those who are also interested in Marine Engineering should take this track."},
		ict: {title: "Information and Communications Technology", description: "If you are computer-savvy or a technological freak, step right into the ICT strand. Under this strand, you will be encouraged to utilize information and communication technological tools to contextualize, collaborate, and create experiences for learning in this professional strand."},
		he: {title: "Home Economics", description: "The Home Economics track offers various specializations that can lead to livelihood projects at home. This strand aims to give you job-ready skills that can help you in finding the right employment."},
		pa: {title: "Performing Arts", description: "The strand introduces the students to principles of theater, music and dance and examines the practical application of the performing arts skills in the local and global market."},
		tesdaICT: {title: "Information and Communications Technology", description: " - Programming NCIV<br> - Visual Graphics NCIII<br> - Computer Hardware Servicing NCII"},
		tesdaHRS: {title: "Hospitality and Restaurant Services", description: " - Housekeeping NCII<br> - Tour Guiding NCII<br> - Bartending NCII<br> - Cookery NCII<br> - Bread and Pastry Production NCII<br> - Food and Beverage Services NCII<br> - Front Office Services NCII"},
		tesdaASR: {title: "Assessment and Review Center", description: "- Bartending NCII<br> - Bread and Pastry Production NCII<br> - Cookery NCII<br> - Food and Beverage Services NCII<br> - Tour Guiding NCII<br> - Housekeeping NCII<br> - Bookeeping NCII<br> - Front Office NCII<br> - Computer System Services NCII"},
	}

//<editor-fold College Modal Codes>
	$("#cs").click(function(){
		$("#title-target").text("Computer Studies");
		$("#body-target").html('<div class="list-group"> ' +
									'<a class="list-group-item">' +
										'<h4 class="list-group-item-heading" style="font-family: lightfont">' + courses['it']['title'] +'</h4>' +
										'<hr></hr><small class="list-group-item-text">'+
											''+courses['it']['description']+''
										+'</small> ' +
									'</a>' +
									'<a class="list-group-item">' +
										'<h4 class="list-group-item-heading" style="font-family: lightfont">' + courses['act']['title'] +'</h4>' +
										'<hr></hr><small class="list-group-item-text">'+
											''+courses['act']['description']+''
										+'</small> ' +
									'</a>' +
									'<a class="list-group-item">' +
										'<h4 class="list-group-item-heading" style="font-family: lightfont">' + courses['blis']['title'] +'</h4>' +
										'<hr></hr><small class="list-group-item-text">'+
											''+courses['blis']['description']+''
										+'</small> ' +
									'</a>' +

								'</div>');
	});

	$("#cs-s").click(function(){
		$("#title-target").text("Computer Studies");
		$("#body-target").html('<div class="list-group"> ' +
									'<a class="list-group-item">' +
										'<h4 class="list-group-item-heading" style="font-family: lightfont">' + courses['it']['title'] +'</h4>' +
										'<hr></hr><small class="list-group-item-text">'+
											''+courses['it']['description']+''
										+'</small> ' +
									'</a>' +
									'<a class="list-group-item">' +
										'<h4 class="list-group-item-heading" style="font-family: lightfont">' + courses['act']['title'] +'</h4>' +
										'<hr></hr><small class="list-group-item-text">'+
											''+courses['act']['description']+''
										+'</small> ' +
									'</a>' +
									'<a class="list-group-item">' +
										'<h4 class="list-group-item-heading" style="font-family: lightfont">' + courses['blis']['title'] +'</h4>' +
										'<hr></hr><small class="list-group-item-text">'+
											''+courses['blis']['description']+''
										+'</small> ' +
									'</a>' +

								'</div>');
	});

	$("#psy").click(function(){
		$("#title-target").text("Psychology");
		$("#body-target").html('<div class="list-group"> ' +
									'<a class="list-group-item">' +
										'<h4 class="list-group-item-heading" style="font-family: lightfont">' + courses['psy']['title'] +'</h4>' +
										'<hr></hr><small class="list-group-item-text">'+
											''+courses['psy']['description']+''
										+'</small> ' +
									'</a>' +
								'</div>');
	});

	$("#psy-s").click(function(){
		$("#title-target").text("Psychology");
		$("#body-target").html('<div class="list-group"> ' +
									'<a class="list-group-item">' +
										'<h4 class="list-group-item-heading" style="font-family: lightfont">' + courses['psy']['title'] +'</h4>' +
										'<hr></hr><small class="list-group-item-text">'+
											''+courses['psy']['description']+''
										+'</small> ' +
									'</a>' +
								'</div>');
	});

	$("#crim").click(function(){
		$("#title-target").text("Criminology");
		$("#body-target").html('<div class="list-group"> ' +
									'<a class="list-group-item">' +
										'<h4 class="list-group-item-heading" style="font-family: lightfont">' + courses['crim']['title'] +'</h4>' +
										'<hr></hr><small class="list-group-item-text">'+
											''+courses['crim']['description']+''
										+'</small> ' +
									'</a>' +
								'</div>');
	});

	$("#crim-s").click(function(){
		$("#title-target").text("Criminology");
		$("#body-target").html('<div class="list-group"> ' +
									'<a class="list-group-item">' +
										'<h4 class="list-group-item-heading" style="font-family: lightfont">' + courses['crim']['title'] +'</h4>' +
										'<hr></hr><small class="list-group-item-text">'+
											''+courses['crim']['description']+''
										+'</small> ' +
									'</a>' +
								'</div>');
	});

	$("#educ").click(function(){
		$("#title-target").text("Education");
		$("#body-target").html('<div class="list-group"> ' +
									'<a class="list-group-item">' +
										'<h4 class="list-group-item-heading" style="font-family: lightfont">' + courses['eeduc']['title'] +'</h4>' +
										'<hr></hr><small class="list-group-item-text">'+
											''+courses['eeduc']['description']+''
										+'</small> ' +
									'</a>' +
									'<a class="list-group-item">' +
										'<h4 class="list-group-item-heading" style="font-family: lightfont">' + courses['seduc']['title'] +'</h4>' +
										'<hr></hr><small class="list-group-item-text">'+
											''+courses['seduc']['description']+''
										+'</small> ' +
									'</a>' +
								'</div>');
	});
	$("#educ-s").click(function(){
		$("#title-target").text("Education");
		$("#body-target").html('<div class="list-group"> ' +
									'<a class="list-group-item">' +
										'<h4 class="list-group-item-heading" style="font-family: lightfont">' + courses['eeduc']['title'] +'</h4>' +
										'<hr></hr><small class="list-group-item-text">'+
											''+courses['eeduc']['description']+''
										+'</small> ' +
									'</a>' +
									'<a class="list-group-item">' +
										'<h4 class="list-group-item-heading" style="font-family: lightfont">' + courses['seduc']['title'] +'</h4>' +
										'<hr></hr><small class="list-group-item-text">'+
											''+courses['seduc']['description']+''
										+'</small> ' +
									'</a>' +
								'</div>');
	});

	$("#bus").click(function(){
		$("#title-target").text("Business");
		$("#body-target").html('<div class="list-group"> ' +
									'<a class="list-group-item">' +
										'<h4 class="list-group-item-heading" style="font-family: lightfont">' + courses['bus']['title'] +'</h4>' +
										'<hr></hr><small class="list-group-item-text">'+
											''+courses['bus']['description']+''
										+'</small> ' +
									'</a>' +
								'</div>');
	});
	$("#bus-s").click(function(){
		$("#title-target").text("Business");
		$("#body-target").html('<div class="list-group"> ' +
									'<a class="list-group-item">' +
										'<h4 class="list-group-item-heading" style="font-family: lightfont">' + courses['bus']['title'] +'</h4>' +
										'<hr></hr><small class="list-group-item-text">'+
											''+courses['bus']['description']+''
										+'</small> ' +
									'</a>' +
								'</div>');
	});

	$("#eng").click(function(){
		$("#title-target").text("Engineering");
		$("#body-target").html('<div class="list-group"> ' +
									'<a class="list-group-item">' +
										'<h4 class="list-group-item-heading" style="font-family: lightfont">' + courses['eng']['title'] +'</h4>' +
										'<hr></hr><small class="list-group-item-text">'+
											''+courses['eng']['description']+''
										+'</small> ' +
									'</a>' +
								'</div>');
	});
	$("#eng-s").click(function(){
		$("#title-target").text("Engineering");
		$("#body-target").html('<div class="list-group"> ' +
									'<a class="list-group-item">' +
										'<h4 class="list-group-item-heading" style="font-family: lightfont">' + courses['eng']['title'] +'</h4>' +
										'<hr></hr><small class="list-group-item-text">'+
											''+courses['eng']['description']+''
										+'</small> ' +
									'</a>' +
								'</div>');
	});

	$("#oa").click(function(){
		$("#title-target").text("Office Administration");
		$("#body-target").html('<div class="list-group"> ' +
									'<a class="list-group-item">' +
										'<h4 class="list-group-item-heading" style="font-family: lightfont">' + courses['oa']['title'] +'</h4>' +
										'<hr></hr><small class="list-group-item-text">'+
											''+courses['oa']['description']+''
										+'</small> ' +
									'</a>' +
								'</div>');
	});
	$("#oa-s").click(function(){
		$("#title-target").text("Office Administration");
		$("#body-target").html('<div class="list-group"> ' +
									'<a class="list-group-item">' +
										'<h4 class="list-group-item-heading" style="font-family: lightfont">' + courses['oa']['title'] +'</h4>' +
										'<hr></hr><small class="list-group-item-text">'+
											''+courses['oa']['description']+''
										+'</small> ' +
									'</a>' +
								'</div>');
	});

	$("#hr").click(function(){
		$("#title-target").text("Hotel and Restaurant Management");
		$("#body-target").html('<div class="list-group"> ' +
									'<a class="list-group-item">' +
										'<h4 class="list-group-item-heading" style="font-family: lightfont">' + courses['hrm']['title'] +'</h4>' +
										'<hr></hr><small class="list-group-item-text">'+
											''+courses['hrm']['description']+''
										+'</small> ' +
									'</a>' +
								'</div>');
	});
	$("#hr-s").click(function(){
		$("#title-target").text("Hotel and Restaurant Management");
		$("#body-target").html('<div class="list-group"> ' +
									'<a class="list-group-item">' +
										'<h4 class="list-group-item-heading" style="font-family: lightfont">' + courses['hrm']['title'] +'</h4>' +
										'<hr></hr><small class="list-group-item-text">'+
											''+courses['hrm']['description']+''
										+'</small> ' +
									'</a>' +
								'</div>');
	});

//</editor-fold>

//<editor-fold SHS Modal Codes>
	$("#abm").click(function(){
		$("#title-target").text(""+courses['abm']['title']+"");
		$("#body-target").html('<div class="list-group"> ' +
									'<a class="list-group-item">' +
										'<h4 class="list-group-item-heading" style="font-family: lightfont">' + courses['abm']['title'] +'</h4>' +
										'<hr></hr><small class="list-group-item-text">'+
											''+courses['abm']['description']+''
										+'</small> ' +
									'</a>' +
								'</div>');
	});

	$("#abm-s").click(function(){
		$("#title-target").text(""+courses['abm']['title']+"");
		$("#body-target").html('<div class="list-group"> ' +
									'<a class="list-group-item">' +
										'<h4 class="list-group-item-heading" style="font-family: lightfont">' + courses['abm']['title'] +'</h4>' +
										'<hr></hr><small class="list-group-item-text">'+
											''+courses['abm']['description']+''
										+'</small> ' +
									'</a>' +
								'</div>');
	});

	$("#gas").click(function(){
		$("#title-target").text(""+courses['gas']['title']+"");
		$("#body-target").html('<div class="list-group"> ' +
									'<a class="list-group-item">' +
										'<h4 class="list-group-item-heading" style="font-family: lightfont">' + courses['gas']['title'] +'</h4>' +
										'<hr></hr><small class="list-group-item-text">'+
											''+courses['gas']['description']+''
										+'</small> ' +
									'</a>' +
								'</div>');
	});

	$("#gas-s").click(function(){
		$("#title-target").text(""+courses['gas']['title']+"");
		$("#body-target").html('<div class="list-group"> ' +
									'<a class="list-group-item">' +
										'<h4 class="list-group-item-heading" style="font-family: lightfont">' + courses['gas']['title'] +'</h4>' +
										'<hr></hr><small class="list-group-item-text">'+
											''+courses['gas']['description']+''
										+'</small> ' +
									'</a>' +
								'</div>');
	});

	$("#humss").click(function(){
		$("#title-target").text(""+courses['humss']['title']+"");
		$("#body-target").html('<div class="list-group"> ' +
									'<a class="list-group-item">' +
										'<h4 class="list-group-item-heading" style="font-family: lightfont">' + courses['humss']['title'] +'</h4>' +
										'<hr></hr><small class="list-group-item-text">'+
											''+courses['humss']['description']+''
										+'</small> ' +
									'</a>' +
								'</div>');
	});


		$("#humss-s").click(function(){
			$("#title-target").text(""+courses['humss']['title']+"");
			$("#body-target").html('<div class="list-group"> ' +
										'<a class="list-group-item">' +
											'<h4 class="list-group-item-heading" style="font-family: lightfont">' + courses['humss']['title'] +'</h4>' +
											'<hr></hr><small class="list-group-item-text">'+
												''+courses['humss']['description']+''
											+'</small> ' +
										'</a>' +
									'</div>');
		});


		$("#stem").click(function(){
			$("#title-target").text(""+courses['stem']['title']+"");
			$("#body-target").html('<div class="list-group"> ' +
										'<a class="list-group-item">' +
											'<h4 class="list-group-item-heading" style="font-family: lightfont">' + courses['stem']['title'] +'</h4>' +
											'<hr></hr><small class="list-group-item-text">'+
												''+courses['stem']['description']+''
											+'</small> ' +
										'</a>' +
									'</div>');
		});

		$("#stem-s").click(function(){
			$("#title-target").text(""+courses['stem']['title']+"");
			$("#body-target").html('<div class="list-group"> ' +
										'<a class="list-group-item">' +
											'<h4 class="list-group-item-heading" style="font-family: lightfont">' + courses['stem']['title'] +'</h4>' +
											'<hr></hr><small class="list-group-item-text">'+
												''+courses['stem']['description']+''
											+'</small> ' +
										'</a>' +
									'</div>');
		});

		$("#ict").click(function(){
			$("#title-target").text(""+courses['ict']['title']+"");
			$("#body-target").html('<div class="list-group"> ' +
										'<a class="list-group-item">' +
											'<h4 class="list-group-item-heading" style="font-family: lightfont">' + courses['ict']['title'] +'</h4>' +
											'<hr></hr><small class="list-group-item-text">'+
												''+courses['ict']['description']+''
											+'</small> ' +
										'</a>' +
									'</div>');
		});

		$("#ict-s").click(function(){
			$("#title-target").text(""+courses['ict']['title']+"");
			$("#body-target").html('<div class="list-group"> ' +
										'<a class="list-group-item">' +
											'<h4 class="list-group-item-heading" style="font-family: lightfont">' + courses['ict']['title'] +'</h4>' +
											'<hr></hr><small class="list-group-item-text">'+
												''+courses['ict']['description']+''
											+'</small> ' +
										'</a>' +
									'</div>');
		});

		$("#he").click(function(){
			$("#title-target").text(""+courses['he']['title']+"");
			$("#body-target").html('<div class="list-group"> ' +
										'<a class="list-group-item">' +
											'<h4 class="list-group-item-heading" style="font-family: lightfont">' + courses['he']['title'] +'</h4>' +
											'<hr></hr><small class="list-group-item-text">'+
												''+courses['he']['description']+''
											+'</small> ' +
										'</a>' +
									'</div>');
		});

		$("#he-s").click(function(){
			$("#title-target").text(""+courses['he']['title']+"");
			$("#body-target").html('<div class="list-group"> ' +
										'<a class="list-group-item">' +
											'<h4 class="list-group-item-heading" style="font-family: lightfont">' + courses['he']['title'] +'</h4>' +
											'<hr></hr><small class="list-group-item-text">'+
												''+courses['he']['description']+''
											+'</small> ' +
										'</a>' +
									'</div>');
		});

		$("#pa").click(function(){
			$("#title-target").text(""+courses['pa']['title']+"");
			$("#body-target").html('<div class="list-group"> ' +
										'<a class="list-group-item">' +
											'<h4 class="list-group-item-heading" style="font-family: lightfont">' + courses['pa']['title'] +'</h4>' +
											'<hr></hr><small class="list-group-item-text">'+
												''+courses['pa']['description']+''
											+'</small> ' +
										'</a>' +
									'</div>');
		});

		$("#pa-s").click(function(){
			$("#title-target").text(""+courses['pa']['title']+"");
			$("#body-target").html('<div class="list-group"> ' +
										'<a class="list-group-item">' +
											'<h4 class="list-group-item-heading" style="font-family: lightfont">' + courses['pa']['title'] +'</h4>' +
											'<hr></hr><small class="list-group-item-text">'+
												''+courses['pa']['description']+''
											+'</small> ' +
										'</a>' +
									'</div>');
		});

//</editor-fold>

//<editor-fold TESDA Modal Codes>
	$("#ict-tesda").click(function(){
		$("#title-target").text(""+courses['tesdaICT']['title']+"");
		$("#body-target").html('<div class="list-group"> ' +
									'<a class="list-group-item">' +
										'<h4 class="list-group-item-heading" style="font-family: lightfont">' + courses['tesdaICT']['title'] +'</h4>' +
										'<hr></hr><small class="list-group-item-text">'+
											''+courses['tesdaICT']['description']+''
										+'</small> ' +
									'</a>' +
								'</div>');
	});
	$("#hrs-tesda").click(function(){
		$("#title-target").text(""+courses['tesdaHRS']['title']+"");
		$("#body-target").html('<div class="list-group"> ' +
									'<a class="list-group-item">' +
										'<h4 class="list-group-item-heading" style="font-family: lightfont">' + courses['tesdaHRS']['title'] +'</h4>' +
										'<hr></hr><small class="list-group-item-text">'+
											''+courses['tesdaHRS']['description']+''
										+'</small> ' +
									'</a>' +
								'</div>');
	});
	$("#asr-tesda").click(function(){
		$("#title-target").text(""+courses['tesdaASR']['title']+"");
		$("#body-target").html('<div class="list-group"> ' +
									'<a class="list-group-item">' +
										'<h4 class="list-group-item-heading" style="font-family: lightfont">' + courses['tesdaASR']['title'] +'</h4>' +
										'<hr></hr><small class="list-group-item-text">'+
											''+courses['tesdaASR']['description']+''
										+'</small> ' +
									'</a>' +
								'</div>');
	});
//</editor-fold>
});
