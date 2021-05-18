<h1 class="mt-4">Materias</h1>
<div class="mt-3">
	<?php if(count($Courses)==0): ?>
		<h3 class="alert alert-danger" role="alert">Debe haber al menos un curso para añadir una materia</h3>
	<?php else: ?>
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#CreateSubjectModal">
			Añadir
		</button>
	<?php endif; ?>
	<div class="table-responsive mt-4">
		<table class="table table-bordered" width="100%" cellspacing="0">
			<thead>
				<tr>
					<th>Id</th>
					<th>Curso</th>
					<th>Materia</th>
					<th>Crédito</th>
					<th>Horario</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody id="body-subject">

			</tbody>
		</table>
	</div>
</div>

<!-- Modal Create course-->
<div class="modal fade" id="CreateSubjectModal" tabindex="-1" aria-labelledby="CreateSubjectModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="CreateSubjectModalLabel">Añadir Materia</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="col-md-12 mb-4">
					<label for="subject">Materia:</label>
					<input type="text" class="form-control" name="subject" id="subject" placeholder="Escriba el nombre de la materia">
					<span class="text-danger mt-4" id="subject_error"></span>
				</div>
				<div class="col-md-12 mb-4">
					<label for="course" class="form-label">Curso:</label>
					<select name="Course" required class="form-select" id="sub_course">
						<option value="empty">Seleccione una opcion</option>
						<?php foreach ($Courses as $course) : ?>
							<option value="<?= $course->id_curso; ?>"> <?= $course->nombre_curso ?> </option>
						<?php endforeach; ?>
					</select>
					<span class="text-danger mt-4" id="sub_course_error"></span>
				</div>
				<div class="col-md-12 mb-4">
					<label for="credit">Crédito:</label>
					<input type="number" class="form-control" name="credit" id="credit" placeholder="Cuántos créditos de la materia">
					<span class="text-danger mt-4" id="credit_error"></span>
				</div>
				<div class="col-md-12 mb-4">
					<label for="schedule">Horario:</label>
					<input type="time" class="form-control" name="schedule" id="schedule" placeholder="Horario de la materia">
					<span class="text-danger mt-4" id="horario_error"></span>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" id="save_subject" class="btn btn-primary">Guardar</button>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal Edit course-->
<div class="modal fade" id="EditSubjectModal" tabindex="-1" aria-labelledby="EditSubjectModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="EditSubjectModalLabel">Edición de Materia</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
			<div class="col-md-12 mb-4">
							<input type="hidden" id="id_sub">
			</div>
			<div class="col-md-12 mb-4">
					<label for="edit_subject">Materia:</label>
					<input type="text" required class="form-control" name="subject" id="edit_subject_name" placeholder="Escriba el nombre de la materia">
					<span class="text-danger mt-4" id="edit_subject_error"></span>
				</div>
				<div class="col-md-12 mb-4">
					<label for="edit_course_sub" class="form-label">Curso:</label>
					<select name="sub_course" required class="form-select" id="edit_course_sub">
						<option value="">Seleccione una opcion</option>
						<?php foreach ($Courses as $course) : ?>
							<option value="<?= $course->id_curso; ?>"> <?= $course->nombre_curso ?> </option>
						<?php endforeach; ?>
					</select>
					<span class="text-danger mt-4" id="sub_course_error"></span>
				</div>
				<div class="col-md-12 mb-4">
					<label for="credit_sub">Crédito:</label>
					<input type="number" class="form-control" required name="credito" id="credit_sub" placeholder="Cuántos créditos de la materia">
					<span class="text-danger mt-4" id="credito_error"></span>
				</div>
				<div class="col-md-12 mb-4">
					<label for="schedule_sub">Horario:</label>
					<input type="time" class="form-control" required name="schedule_sub" id="schedule_sub" placeholder="Horario de la materia">
					<span class="text-danger mt-4" id="horario_error"></span>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" id="update_subject" class="btn btn-primary">Actualizar</button>
				</div>
			</div>
		</div>
	</div>
</div>
