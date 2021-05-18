$(document).ready(function () 
{
	loadCourses();

	loadSubjects();

	loadStudents();

	// Courses handle

	$('#save_course').click(function () {

		if ($.trim($('#curso').val()).length == 0) {
			error_curso = 'Este campo no puede estar vacío';
			$('#curso_error').text(error_curso);
		} else {
			error_curso = '';
			$('#curso_error').text(error_curso);
		}

		if (error_curso != '') {
			return false;
		} else {
			$.ajax({
				type: "POST",
				url: "Course/courseSave",
				data: {
					"curso": $("#curso").val()
				},
				success: function (response) {
					$('#CreateCursoModal').modal('hide');
					$('#CreateCursoModal input').val('');
					Swal.fire({
						position: 'center',
						icon: 'success',
						title: JSON.parse(response).status,
						showConfirmButton: false,
						timer: 1500
					})
					loadCourses();
				},
				error: function (param) {
					console.log(param)
				}
			});
		}
	});

	$(document).on('click', '.edit', function () {
		$('#EditCourseId').val($(this).data('id'));
		$('#EditCourseName').val($(this).data('course'));
	});

	$(document).on('click', '#update_course', function () {

		if ($.trim($('#EditCourseName').val()).length == 0) {
			err_curso_edit = 'Este campo no puede estar vacío';
			$('#err_cour_edit').text(err_curso_edit);
		} else {
			err_curso_edit = '';
			$('#err_cour_edit').text(err_curso_edit);
		}

		if (err_curso_edit != '') {


		} else {

			let data = {
				"id": $('#EditCourseId').val(),
				"name_course": $('#EditCourseName').val()
			}

			$.ajax({
				method: "post",
				url: "Course/updateCourse",
				data: data,
				success: function (response) {

					$('#EditCourseModal').modal('hide');
					$('#EditCourseModal input').val('');

					Swal.fire({
						position: 'center',
						icon: 'success',
						title: JSON.parse(response).status,
						showConfirmButton: false,
						timer: 2000
					})

					loadCourses();
				}
			});
		}
	});

	$(document).on('click', '.delete', function () {
		let id = $(this).data("id");
		Swal.fire({
			title: '¿Está seguro de eliminar el curso ' + id + ' ?',
			icon: 'warning',
			showCancelButton: true,
			width: 650,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Sí, eliminarlo!'
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					method: "post",
					url: "Course/deleteCourse",
					data: {
						"id": id
					},
					success: function (response) {
						Swal.fire({
							position: 'center',
							icon: 'success',
							title: JSON.parse(response).status,
							showConfirmButton: false,
							timer: 1500
						})
						loadCourses();
					}
				});
			}
		});
	});

	function loadCourses() {
		$.ajax({
			method: "GET",
			url: "Course/coursesLoad",
			dataType: 'json',
			success: function (response) {
				$('#body-course').html('');
				$.each(response, function (key, item) {
					$('#body-course').append(`
                    <tr>
                        <td>${item["id_curso"]}</td>
                        <td>${item["nombre_curso"]}</td>
                        <td>
                            <button class="btn btn-warning edit" data-toggle="modal" data-target="#EditCourseModal" data-course="${item["nombre_curso"]}" data-id="${item["id_curso"]}"><i class="fas fa-edit"></i></button>
                        </td>
                        <td>
                            <button class="btn btn-danger delete" data-id="${item["id_curso"]}"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                    `);
				})
			},
			error: function (param) {
				console.log(param)
			}
		});
	}

	// Subjects handle

	$(document).on('click', '#save_subject', function () {
		$.ajax({
			type: "POST",
			url: "Subject/subjectSave",
			data: {
				"id_course": $("#sub_course").val(),
				"subject": $("#subject").val(),
				"credit": $("#credit").val(),
				"schedule": $("#schedule").val()
			},
			success: function (response) {
				$('#CreateSubjectModal').modal('hide');
				$("#sub_course option[value=empty]").attr("selected", true);
				$('#CreateSubjectModal input').val('');
				Swal.fire({
					position: 'center',
					icon: 'success',
					title: JSON.parse(response).status,
					showConfirmButton: false,
					timer: 1500
				})
				loadSubjects();
			},
			error: function (param) {
				console.log(param)
			}
		});
	});

	$(document).on('click', '.edit_subject', function() {
		$('#id_sub').val($(this).parent().prev().prev().prev().prev().prev().text());
		$('#edit_course_sub option[value='+$(this).parent().prev().prev().prev().prev().text()+']').attr('selected', true);
		$('#edit_subject_name').val($(this).parent().prev().prev().prev().text());
		$('#credit_sub').val($(this).parent().prev().prev().text());

		// let schedule = $(this).parent().prev().text();
		// let sub = schedule.substr(0,5);
		// console.log(sub)
		// $('#schedule').val(sub);
	});

	$(document).on('click', '#update_subject', function() {
		$.ajax({
			type: "POST",
			url: "Subject/subjectUpdate",
			data: {
				"id" : $("#id_sub").val(),
				"id_course" : $("#edit_course_sub").val(),
				"subject" : $("#edit_subject_name").val(),
				"credit" : $("#credit_sub").val(),
				"schedule":  $("#schedule_sub").val()
			},
			success: function (response) {
				$('#EditSubjectModal').modal('hide');
				$('#EditSubjectModal input').val('');
				$("#edit_course_sub option[value='']").attr("selected", true);
				Swal.fire({
					position: 'center',
					icon: 'success',
					title: JSON.parse(response).status,
					showConfirmButton: false,
					timer: 1500
				})
				loadSubjects();
			},
			error: function (param) {
				console.log(param)
			}
		});
	});

	$(document).on('click', '.delete_subject', function () {
		let id = $(this).data("id");
		Swal.fire({
			title: '¿Está seguro de eliminar la materia ' + id + ' ?',
			icon: 'warning',
			showCancelButton: true,
			width: 650,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Sí, eliminarla!'
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					method: "post",
					url: "Subject/subjectDelete",
					data: {
						"id": id
					},
					success: function (response) {
						Swal.fire({
							position: 'center',
							icon: 'success',
							title: JSON.parse(response).status,
							showConfirmButton: false,
							timer: 1500
						})
						loadSubjects();
					}
				});
			}
		});
	});

	function loadSubjects() {
		$.ajax({
			method: "GET",
			url: "Subject/subjectLoad",
			dataType: 'json',
			success: function (response) {
				$('#body-subject').html('');
				$.each(response, function (key, item) {
					$('#body-subject').append(`
                    <tr>
                        <td>${item["id"]}</td>
                        <td>${item["id_curso"]}</td>
                        <td>${item["nombre_materia"]}</td>
						<td>${item["credito"]}</td>
						<td>${item["horario"]}</td>
                        <td>
						<button type="button" class="btn btn-warning edit_subject" data-toggle="modal" data-target="#EditSubjectModal" data-id="${item["id"]}"><i class="fas fa-edit"></i></button>
                            <button class="btn btn-danger delete_subject" data-id="${item["id"]}"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                    `);
				})
			},
			error: function (param) {
				console.log(param)
			}
		});
	}

	// Students handle

	$(document).on('click', '#save_student', function () 
	{
		$.ajax({
			type: "POST",
			url: "Student/studentSave",
			data: {
				"id_course": $("#stu_course").val(),
				"f_name": $("#f_name").val(),
				"l_name": $("#l_name").val(),
				"address": $("#stu_address").val()
			},
			success: function (response) {
				$('#CreateStudentModal').modal('hide');
				$("#stu_course option[value='']").attr("selected", true);
				$('#CreateStudentModal input').val('');
				Swal.fire({
					position: 'center',
					icon: 'success',
					title: JSON.parse(response).status,
					showConfirmButton: false,
					timer: 1500
				})
				loadStudents();
			},
			error: function (param) {
				console.log(param)
			}
		});
	});

	$(document).on('click', '.edit_student', function() 
	{
		$('#id_stu').val($(this).data('id'));
		$('#edit_course_stu option[value='+$(this).parent().prev().prev().prev().prev().text()+']').attr('selected', true);
		$('#edit_f_name').val($(this).parent().prev().prev().prev().text());
		$('#edit_l_name').val($(this).parent().prev().prev().text());
		$('#edit_stu_address').val($(this).parent().prev().text());
	});

	$(document).on('click', '#update_student', function() {
		$.ajax({
			type: "POST",
			url: "Student/studentUpdate",
			data: {
				"id" : $("#id_stu").val(),
				"id_course" : $("#edit_course_stu").val(),
				"f_name" : $("#edit_f_name").val(),
				"l_name" : $("#edit_l_name").val(),
				"address":  $("#edit_stu_address").val()
			},
			success: function (response) {
				$('#EditStudentModal').modal('hide');
				$('#EditStudentModal input').val('');
				$("#edit_course_stu option[value='']").attr("selected", true);
				Swal.fire({
					position: 'center',
					icon: 'success',
					title: JSON.parse(response).status,
					showConfirmButton: false,
					timer: 1500
				})
				loadStudents();
			},
			error: function (param) {
				console.log(param)
			}
		});
	});

	$(document).on('click', '.delete_student', function () {
		let id = $(this).data("id");
		Swal.fire({
			title: '¿Está seguro de eliminar al estudiante número ' + id + ' ?',
			icon: 'warning',
			showCancelButton: true,
			width: 650,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Sí, eliminarlo!'
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					method: "post",
					url: "Student/studentDelete",
					data: {
						"id": id
					},
					success: function (response) {
						Swal.fire({
							position: 'center',
							icon: 'success',
							title: JSON.parse(response).status,
							showConfirmButton: false,
							timer: 1500
						})
						loadStudents();
					},
				}).fail( function(jqXHR, textStatus, errorThrown) {

					if(jqXHR.status==500){
						alert( 'Error 500!!' );
					}
				});
			}
		});
	});

	function loadStudents() {
		$.ajax({
			method: "GET",
			url: "Student/studentLoad",
			dataType: 'json',
			success: function (response) {
				$('#body-student').html('');
				$.each(response, function (key, item) {
					$('#body-student').append(`
                    <tr>
                        <td>${item["id"]}</td>
                        <td>${item["id_curso"]}</td>
                        <td>${item["nombre"]}</td>
						<td>${item["apellido"]}</td>
						<td>${item["direccion"]}</td>
                        <td>
						<button type="button" class="btn btn-warning edit_student" data-toggle="modal" data-target="#EditStudentModal" data-id="${item["id"]}"><i class="fas fa-edit"></i></button>
                            <button class="btn btn-danger delete_student" data-id="${item["id"]}"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                    `);
				})
			},
			error: function (param) {
				console.log(param)
			}
		});
	}
});
