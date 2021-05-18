<h1 class="mt-4">Estudiates</h1>
<div class="mt-3">
	<?php if(count($Courses)==0): ?>
		<h3 class="alert alert-danger" role="alert">Debe haber al menos un curso para añadir un estudiante</h3>
	<?php else: ?>
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#CreateStudentModal">
			Añadir
		</button>
	<?php endif; ?>
	<div class="table-responsive mt-4">
		<table class="table table-bordered" width="100%" cellspacing="0">
			<thead>
				<tr>
					<th>Id</th>
					<th>Curso</th>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Dirección</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody id="body-student">

			</tbody>
		</table>
	</div>
</div>

<!-- Modal Create course-->
<div class="modal fade" id="CreateStudentModal" tabindex="-1" aria-labelledby="CreateStudentModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="CreateStudentModalLabel">Añadir Estudiante</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="col-md-12 mb-4">
					<label for="f_name">Nombre:</label>
					<input type="text" class="form-control" name="student" id="f_name" placeholder="Escriba el nombre del estudiante">
					<span class="text-danger mt-4" id="f_name_error"></span>
				</div>
				<div class="col-md-12 mb-4">
					<label for="stu_course" class="form-label">Curso:</label>
					<select name="stu_course" required class="form-select" id="stu_course">
						<option value="empty">Seleccione una opcion</option>
						<?php foreach ($Courses as $course) : ?>
							<option value="<?= $course->id_curso; ?>"> <?= $course->nombre_curso ?> </option>
						<?php endforeach; ?>
					</select>
					<span class="text-danger mt-4" id="stu_course_error"></span>
				</div>
				<div class="col-md-12 mb-4">
					<label for="l_name">Apellido:</label>
					<input type="text" class="form-control" name="l_name" id="l_name" placeholder="Escriba el apellido del estudiante">
					<span class="text-danger mt-4" id="l_name_error"></span>
				</div>
				<div class="col-md-12 mb-4">
					<label for="stu_address">Dirección:</label>
					<input type="text" class="form-control" name="stu_address" id="stu_address" placeholder="Escriba la dirección del estudiante">
					<span class="text-danger mt-4" id="stu_address_error"></span>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" id="save_student" class="btn btn-primary">Guardar</button>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal Edit course-->
<div class="modal fade" id="EditStudentModal" tabindex="-1" aria-labelledby="EditStudentModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="EditStudentModalLabel">Edición de estudiante</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
			<div class="col-md-12 mb-4">
				<input type="hidden" id="id_stu">
			</div>
			<div class="col-md-12 mb-4">
					<label for="edit_f_name">Nombre:</label>
					<input type="text" required class="form-control" name="edit_f_name" id="edit_f_name" placeholder="Escriba el nombre de la materia">
					<span class="text-danger mt-4" id="edit_f_name_error"></span>
				</div>
				<div class="col-md-12 mb-4">
					<label for="edit_course_stu" class="form-label">Curso:</label>
					<select name="stu_course" required class="form-select" id="edit_course_stu">
						<option value="">Seleccione una opcion</option>
						<?php foreach ($Courses as $course) : ?>
							<option value="<?= $course->id_curso; ?>"> <?= $course->nombre_curso ?> </option>
						<?php endforeach; ?>
					</select>
					<span class="text-danger mt-4" id="stu_course_error"></span>
				</div>
				<div class="col-md-12 mb-4">
					<label for="edit_l_name">Apellido:</label>
					<input type="text" class="form-control" name="edit_l_name" id="edit_l_name" placeholder="Escriba el apellido del estudiante">
					<span class="text-danger mt-4" id="edit_l_name_error"></span>
				</div>
				<div class="col-md-12 mb-4">
					<label for="edit_stu_address">Dirección:</label>
					<input type="text" class="form-control" name="edit_stu_address" id="edit_stu_address" placeholder="Escriba la dirección del estudiante">
					<span class="text-danger mt-4" id="edit_stu_address_error"></span>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" id="update_student" class="btn btn-primary">Actualizar</button>
				</div>
			</div>
		</div>
	</div>
</div>
