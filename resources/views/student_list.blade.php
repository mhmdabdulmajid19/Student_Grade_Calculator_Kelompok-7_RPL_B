{{-- resources/views/student_list.blade.php --}}

@extends('layout')

@section('content')
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa - Student Grade Calculator</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background-color: #f5f5f5;
            color: #333;
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            padding: 2rem;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .header h1 {
            font-size: 1.8rem;
            font-weight: 700;
            color: #333;
            margin: 0;
        }

        .btn {
            display: inline-block;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-danger {
            background-color: #dc3545;
            color: white;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .btn-primary {
            background-color: #007bff;
            color: white;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-success {
            background-color: #28a745;
            color: white;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        .btn-cyan {
            background-color: #17a2b8;
            color: white;
        }

        .btn-cyan:hover {
            background-color: #138496;
        }

        .btn-secondary {
            background-color: #6c757d;
            color: white;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        .search-box {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }

        .search-box input {
            flex: 1;
            padding: 10px 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }

        .search-box input:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 0 2px rgba(0, 123, 255, 0.25);
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }

        .table th,
        .table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .table th {
            background-color: #333;
            color: white;
            font-weight: 600;
        }

        .table tbody tr:hover {
            background-color: #f8f9fa;
        }

        .grade-display {
            font-weight: bold;
            font-size: 16px;
            text-align: center;
        }

        .grade-a { color: #28a745; }
        .grade-b { color: #007bff; }
        .grade-c { color: #ffc107; }
        .grade-d { color: #fd7e14; }
        .grade-e { color: #dc3545; }
        .grade-none { color: #666; }

        .action-buttons {
            display: flex;
            gap: 5px;
            flex-wrap: wrap;
        }

        /* Pagination Styles */
        .pagination-wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 2rem;
            gap: 1rem;
        }

        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
        }

        .pagination .page-item {
            margin: 0;
        }

        .pagination .page-link {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            padding: 0;
            border: 2px solid #e9ecef;
            background-color: white;
            color: #6c757d;
            text-decoration: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .pagination .page-link:hover {
            border-color: #007bff;
            background-color: #f8f9fa;
            color: #007bff;
            transform: translateY(-1px);
        }

        .pagination .page-item.active .page-link {
            background-color: #007bff;
            border-color: #007bff;
            color: white;
            box-shadow: 0 2px 8px rgba(0, 123, 255, 0.3);
        }

        .pagination .page-item.disabled .page-link {
            color: #adb5bd;
            border-color: #e9ecef;
            background-color: #f8f9fa;
            cursor: not-allowed;
        }

        .pagination .page-item.disabled .page-link:hover {
            transform: none;
            border-color: #e9ecef;
            background-color: #f8f9fa;
        }

        /* Arrow icons for prev/next */
        .pagination .page-link[rel="prev"]::before {
            content: "←";
            font-size: 16px;
        }

        .pagination .page-link[rel="next"]::before {
            content: "→";
            font-size: 16px;
        }

        /* Info text styling */
        .pagination-info {
            color: #6c757d;
            font-size: 14px;
            text-align: center;
        }

        .pagination-info strong {
            color: #333;
            font-weight: 600;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
            align-items: center;
            justify-content: center;
        }

        .modal.show {
            display: flex;
        }

        .modal-content {
            background-color: white;
            padding: 0;
            border-radius: 12px;
            width: 90%;
            max-width: 500px;
            max-height: 90vh;
            overflow-y: auto;
            position: relative;
            box-shadow: 0 4px 20px rgba(0,0,0,0.15);
            border: 1px solid #e0e0e0;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 24px;
            border-bottom: 1px solid #e0e0e0;
            background-color: #f8f9fa;
            border-radius: 12px 12px 0 0;
        }

        .modal-title {
            font-size: 1.3rem;
            font-weight: 600;
            margin: 0;
            color: #333;
        }

        .close {
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            color: #666;
            padding: 0;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            transition: background-color 0.3s ease;
        }

        .close:hover {
            color: #333;
            background-color: #e9ecef;
        }

        .modal-body {
            padding: 24px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #333;
            font-size: 14px;
        }

        .form-control {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 14px;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
            background-color: #fafafa;
        }

        .form-control:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.1);
            background-color: white;
        }

        .form-control[readonly] {
            background-color: #f8f9fa;
            color: #666;
        }

        .calculate-button {
            width: 100%;
            background: linear-gradient(135deg, #17a2b8 0%, #138496 100%);
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin: 20px 0;
        }

        .calculate-button:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(23, 162, 184, 0.3);
        }

        .modal-footer {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            padding: 20px 24px;
            border-top: 1px solid #e0e0e0;
            background-color: #f8f9fa;
            border-radius: 0 0 12px 12px;
        }

        .modal-footer .btn {
            padding: 10px 20px;
            font-size: 14px;
            border-radius: 6px;
        }

        .alert {
            padding: 12px 16px;
            margin-bottom: 20px;
            border-radius: 8px;
            border: 1px solid transparent;
        }

        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }

        .error-message {
            color: #dc3545;
            font-size: 0.85rem;
            margin-top: 6px;
        }

        .preview-grade {
            text-align: center;
            padding: 16px;
            margin: 20px 0;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: 600;
            border: 2px solid;
        }

        .preview-grade.grade-a {
            background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%);
            color: #155724;
            border-color: #28a745;
        }

        .preview-grade.grade-b {
            background: linear-gradient(135deg, #cce7ff 0%, #b8daff 100%);
            color: #004085;
            border-color: #007bff;
        }

        .preview-grade.grade-c {
            background: linear-gradient(135deg, #fff3cd 0%, #ffeaa7 100%);
            color: #856404;
            border-color: #ffc107;
        }

        .preview-grade.grade-d {
            background: linear-gradient(135deg, #ffeaa7 0%, #fab005 100%);
            color: #533f03;
            border-color: #fd7e14;
        }

        .preview-grade.grade-e {
            background: linear-gradient(135deg, #f8d7da 0%, #f5c6cb 100%);
            color: #721c24;
            border-color: #dc3545;
        }

        @media (max-width: 768px) {
            .container {
                padding: 10px;
            }

            .header {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }

            .table {
                font-size: 14px;
            }

            .table th,
            .table td {
                padding: 8px;
            }

            .search-box {
                flex-direction: column;
            }

            .action-buttons {
                flex-direction: column;
            }

            .action-buttons .btn {
                width: 100%;
                text-align: center;
            }

            .pagination .page-link {
                width: 35px;
                height: 35px;
                font-size: 12px;
            }

            .pagination-info {
                font-size: 12px;
            }

            .modal-content {
                width: 95%;
                margin: 10px;
                max-height: 95vh;
            }

            .modal-header,
            .modal-body,
            .modal-footer {
                padding: 16px;
            }

            .modal-footer {
                flex-direction: column;
            }

            .modal-footer .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="header">
                <h1>DAFTAR MAHASISWA</h1>
                <a href="{{ route('courses.index') }}" class="btn btn-danger">Kembali</a>
            </div>

            <div class="search-box">
                <input 
                    type="text" 
                    placeholder="Cari Mahasiswa......"
                    id="searchInput"
                    onkeyup="filterStudents()"
                >
                <button type="button" class="btn btn-primary" onclick="filterStudents()">Cari</button>
            </div>

            @if($students->count() > 0)
                <table class="table" id="studentTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NIM</th>
                            <th>Angkatan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                            <th>Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $index => $student)
                        @php
                            $grade = $student->getGradeForCourse($course->id);
                            $gradeValue = $grade ? $grade->hasil_akhir : null;
                            $gradeClass = 'grade-none';
                            
                            if ($gradeValue) {
                                switch($gradeValue) {
                                    case 'A': $gradeClass = 'grade-a'; break;
                                    case 'B': $gradeClass = 'grade-b'; break;
                                    case 'C': $gradeClass = 'grade-c'; break;
                                    case 'D': $gradeClass = 'grade-d'; break;
                                    case 'E': $gradeClass = 'grade-e'; break;
                                    default: $gradeClass = 'grade-none';
                                }
                            }
                        @endphp
                        <tr class="student-row">
                            <td>{{ $loop->iteration + ($students->currentPage() - 1) * $students->perPage() }}</td>
                            <td class="student-name">{{ $student->name }}</td>
                            <td>{{ $student->nim }}</td>
                            <td>{{ $student->angkatan }}</td>
                            <td>{{ $student->status }}</td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn btn-success" onclick="openGradeModal({{ $student->id }}, '{{ $student->name }}', 'detail')">Detail</button>
                                    <button class="btn btn-cyan" onclick="openGradeModal({{ $student->id }}, '{{ $student->name }}', 'edit')">Tambah/Edit</button>
                                </div>
                            </td>
                            <td>
                                <span class="grade-display {{ $gradeClass }}" id="grade-{{ $student->id }}">
                                    {{ $gradeValue ?: '-' }}
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="pagination-wrapper">
                    @if($students->hasPages())
                        <div class="pagination">
                            {{-- Previous Page Link --}}
                            @if ($students->onFirstPage())
                                <span class="page-item disabled">
                                    <span class="page-link" aria-hidden="true">←</span>
                                </span>
                            @else
                                <a class="page-link" href="{{ $students->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"></a>
                            @endif

                            {{-- Pagination Elements --}}
                            @foreach ($students->getUrlRange(1, $students->lastPage()) as $page => $url)
                                @if ($page == $students->currentPage())
                                    <span class="page-item active" aria-current="page">
                                        <span class="page-link">{{ $page }}</span>
                                    </span>
                                @else
                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                @endif
                            @endforeach

                            {{-- Next Page Link --}}
                            @if ($students->hasMorePages())
                                <a class="page-link" href="{{ $students->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"></a>
                            @else
                                <span class="page-item disabled">
                                    <span class="page-link" aria-hidden="true">→</span>
                                </span>
                            @endif
                        </div>

                        {{-- Pagination Info --}}
                        <div class="pagination-info">
                            Showing <strong>{{ $students->firstItem() }}</strong> to <strong>{{ $students->lastItem() }}</strong> of <strong>{{ $students->total() }}</strong> results
                        </div>
                    @endif
                </div>
            @else
                <div style="text-align: center; padding: 3rem; color: #666;">
                    <h3>Tidak ada mahasiswa yang terdaftar</h3>
                    <p>Belum ada mahasiswa yang terdaftar di mata kuliah ini.</p>
                </div>
            @endif
        </div>
    </div>

    <!-- Modal untuk Detail/Edit Nilai -->
    <div id="gradeModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="modalTitle">Tambah/Edit Nilai</h3>
                <button type="button" class="close" onclick="closeModal()">×</button>
            </div>

            <form id="gradeForm" method="POST">
                @csrf
                <div class="modal-body">
                    <div id="studentInfo" class="form-group" style="background: #f8f9fa; padding: 12px; border-radius: 6px; margin-bottom: 20px;">
                        <strong id="studentName">Nama Mahasiswa</strong>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Aktifitas Partisipatif (25%)</label>
                        <input 
                            type="number" 
                            name="aktifitas_partisipatif" 
                            class="form-control grade-input" 
                            step="0.01" 
                            min="0" 
                            max="100"
                            placeholder="Masukkan nilai 0-100"
                            required
                        >
                        <div class="error-message" style="display: none;"></div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Hasil Proyek (25%)</label>
                        <input 
                            type="number" 
                            name="hasil_proyek" 
                            class="form-control grade-input" 
                            step="0.01" 
                            min="0" 
                            max="100"
                            placeholder="Masukkan nilai 0-100"
                            required
                        >
                        <div class="error-message" style="display: none;"></div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Quiz (10%)</label>
                        <input 
                            type="number" 
                            name="quiz" 
                            class="form-control grade-input" 
                            step="0.01" 
                            min="0" 
                            max="100"
                            placeholder="Masukkan nilai 0-100"
                            required
                        >
                        <div class="error-message" style="display: none;"></div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Tugas (10%)</label>
                        <input 
                            type="number" 
                            name="tugas" 
                            class="form-control grade-input" 
                            step="0.01" 
                            min="0" 
                            max="100"
                            placeholder="Masukkan nilai 0-100"
                            required
                        >
                        <div class="error-message" style="display: none;"></div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">UTS (15%)</label>
                        <input 
                            type="number" 
                            name="uts" 
                            class="form-control grade-input" 
                            step="0.01" 
                            min="0" 
                            max="100"
                            placeholder="Masukkan nilai 0-100"
                            required
                        >
                        <div class="error-message" style="display: none;"></div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">UAS (15%)</label>
                        <input 
                            type="number" 
                            name="uas" 
                            class="form-control grade-input" 
                            step="0.01" 
                            min="0" 
                            max="100"
                            placeholder="Masukkan nilai 0-100"
                            required
                        >
                        <div class="error-message" style="display: none;"></div>
                    </div>

                    <button type="button" class="calculate-button" onclick="calculateGrade()">
                        Kalkulasi Nilai
                    </button>

                    <div class="form-group">
                        <label class="form-label">Rata-Rata</label>
                        <input 
                            type="number" 
                            id="rata_rata" 
                            name="rata_rata" 
                            class="form-control" 
                            step="0.01" 
                            readonly
                            placeholder="Hasil kalkulasi akan muncul di sini"
                        >
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="closeModal()">Batal</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        let currentStudentId = null;
        let currentStudentGrade = null;

        function filterStudents() {
            const searchInput = document.getElementById('searchInput');
            const filter = searchInput.value.toLowerCase();
            const table = document.getElementById('studentTable');
            const rows = table.getElementsByClassName('student-row');

            for (let i = 0; i < rows.length; i++) {
                const cells = rows[i].getElementsByTagName('td');
                let found = false;
                
                // Search in name, NIM, angkatan, and status columns
                for (let j = 1; j <= 4; j++) {
                    if (cells[j]) {
                        const cellText = cells[j].textContent || cells[j].innerText;
                        if (cellText.toLowerCase().indexOf(filter) > -1) {
                            found = true;
                            break;
                        }
                    }
                }
                
                if (found) {
                    rows[i].style.display = "";
                } else {
                    rows[i].style.display = "none";
                }
            }
        }

        function openGradeModal(studentId, studentName, mode) {
            currentStudentId = studentId;
            document.getElementById('studentName').textContent = studentName;
            
            // Set form action
            const form = document.getElementById('gradeForm');
            form.action = `{{ route('grades.store', ['courseId' => $course->id, 'studentId' => '__STUDENT_ID__']) }}`.replace('__STUDENT_ID__', studentId);
            
            // Set modal title and input states based on mode
            if (mode === 'detail') {
                document.getElementById('modalTitle').textContent = 'Detail Nilai';
                // Make inputs readonly and hide buttons for detail mode
                document.querySelectorAll('.grade-input').forEach(input => {
                    input.setAttribute('readonly', true);
                    input.style.backgroundColor = '#f8f9fa';
                });
                document.querySelector('.calculate-button').style.display = 'none';
                document.querySelector('.modal-footer .btn-success').style.display = 'none';
            } else {
                document.getElementById('modalTitle').textContent = 'Tambah/Edit Nilai';
                // Make inputs editable for edit mode
                document.querySelectorAll('.grade-input').forEach(input => {
                    input.removeAttribute('readonly');
                    input.style.backgroundColor = '#fafafa';
                });
                document.querySelector('.calculate-button').style.display = 'block';
                document.querySelector('.modal-footer .btn-success').style.display = 'inline-block';
            }
            
            // Load existing grade data if available
            loadStudentGrade(studentId);
            
            // Show modal
            document.getElementById('gradeModal').classList.add('show');
        }

        function closeModal() {
            document.getElementById('gradeModal').classList.remove('show');
            resetForm();
        }

        function resetForm() {
            document.getElementById('gradeForm').reset();
            document.getElementById('rata_rata').value = '';
            
            // Remove preview if exists
            const existingPreview = document.getElementById('gradePreview');
            if (existingPreview) {
                existingPreview.remove();
            }
            
            // Reset error styles
            document.querySelectorAll('.grade-input').forEach(input => {
                input.style.borderColor = '#ddd';
            });
        }

        async function loadStudentGrade(studentId) {
            // Reset form first
            resetForm();
            
            @foreach($students as $student)
                @php $grade = $student->getGradeForCourse($course->id); @endphp
                if ({{ $student->id }} === studentId && {{ $grade ? 'true' : 'false' }}) {
                    // Fill form with existing data from PHP
                    document.querySelector('input[name="aktifitas_partisipatif"]').value = '{{ $grade ? $grade->aktifitas_partisipatif : '' }}';
                    document.querySelector('input[name="hasil_proyek"]').value = '{{ $grade ? $grade->hasil_proyek : '' }}';
                    document.querySelector('input[name="quiz"]').value = '{{ $grade ? $grade->quiz : '' }}';
                    document.querySelector('input[name="tugas"]').value = '{{ $grade ? $grade->tugas : '' }}';
                    document.querySelector('input[name="uts"]').value = '{{ $grade ? $grade->uts : '' }}';
                    document.querySelector('input[name="uas"]').value = '{{ $grade ? $grade->uas : '' }}';
                    document.getElementById('rata_rata').value = '{{ $grade ? $grade->rata_rata : '' }}';
                    
                    // Auto calculate if all values exist
                    setTimeout(calculateGrade, 100);
                    return;
                }
            @endforeach
        }

        function calculateGrade() {
            const aktifitas = parseFloat(document.querySelector('input[name="aktifitas_partisipatif"]').value) || 0;
            const proyek = parseFloat(document.querySelector('input[name="hasil_proyek"]').value) || 0;
            const quiz = parseFloat(document.querySelector('input[name="quiz"]').value) || 0;
            const tugas = parseFloat(document.querySelector('input[name="tugas"]').value) || 0;
            const uts = parseFloat(document.querySelector('input[name="uts"]').value) || 0;
            const uas = parseFloat(document.querySelector('input[name="uas"]').value) || 0;

            // Validate all inputs are filled
            const inputs = document.querySelectorAll('.grade-input');
            let allFilled = true;
            inputs.forEach(input => {
                if (!input.value || parseFloat(input.value) < 0 || parseFloat(input.value) > 100) {
                    allFilled = false;
                }
            });

            if (!allFilled) {
                alert('Harap isi semua nilai dengan benar (0-100)');
                return;
            }

            const rataRata = (
                (aktifitas * 0.25) +
                (proyek * 0.25) +
                (quiz * 0.10) +
                (tugas * 0.10) +
                (uts * 0.15) +
                (uas * 0.15)
            );

            document.getElementById('rata_rata').value = rataRata.toFixed(2);

            let letterGrade = '';
            let gradeClass = '';
            if (rataRata >= 80) {
                letterGrade = 'A';
                gradeClass = 'grade-a';
            } else if (rataRata >= 70) {
                letterGrade = 'B';
                gradeClass = 'grade-b';
            } else if (rataRata >= 60) {
                letterGrade = 'C';
                gradeClass = 'grade-c';
            } else if (rataRata >= 50) {
                letterGrade = 'D';
                gradeClass = 'grade-d';
            } else {
                letterGrade = 'E';
                gradeClass = 'grade-e';
            }

            showFinalGradePreview(letterGrade, gradeClass, rataRata);
        }

        function showFinalGradePreview(grade, gradeClass, score) {
            const existingPreview = document.getElementById('gradePreview');
            if (existingPreview) {
                existingPreview.remove();
            }

            const preview = document.createElement('div');
            preview.id = 'gradePreview';
            preview.className = `preview-grade ${gradeClass}`;
            preview.innerHTML = `
                <strong>Preview Hasil Akhir: ${grade}</strong><br>
                <small>Rata-rata: ${score.toFixed(2)}</small>
            `;

            const modalFooter = document.querySelector('.modal-footer');
            modalFooter.parentNode.insertBefore(preview, modalFooter);
        }

        // Close modal when clicking outside
        window.onclick = function(event) {
            if (event.target.classList.contains('modal')) {
                closeModal();
            }
        }

        // Auto-calculate when form inputs change
        document.addEventListener('DOMContentLoaded', function() {
            const gradeInputs = document.querySelectorAll('.grade-input');
            gradeInputs.forEach(input => {
                input.addEventListener('input', function() {
                    clearTimeout(this.calculateTimeout);
                    this.calculateTimeout = setTimeout(() => {
                        const allInputsFilled = Array.from(gradeInputs).every(inp => inp.value && inp.value !== '');
                        if (allInputsFilled) {
                            calculateGrade();
                        }
                    }, 1000);
                });
            });
        });

        // Form submission
        document.getElementById('gradeForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const inputs = document.querySelectorAll('.grade-input');
            let isValid = true;

            inputs.forEach(input => {
                const value = parseFloat(input.value);
                if (isNaN(value) || value < 0 || value > 100 || input.value === '') {
                    isValid = false;
                    input.style.borderColor = '#dc3545';
                } else {
                    input.style.borderColor = '#ddd';
                }
            });

            if (!isValid) {
                alert('Harap pastikan semua nilai terisi dan berada dalam rentang 0-100');
                return;
            }

            // Submit form using standard form submission
            const formData = new FormData(this);
            
            // Add CSRF token
            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '{{ csrf_token() }}';
            
            fetch(this.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': csrfToken
                }
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.text().then(text => {
                    try {
                        return JSON.parse(text);
                    } catch (e) {
                        console.log('Response is not JSON:', text);
                        // If not JSON, assume it's a redirect (success)
                        return { success: true, redirect: true };
                    }
                });
            })
            .then(data => {
                if (data.success) {
                    alert('Nilai berhasil disimpan!');
                    // Reload the page to show updated data
                    window.location.reload();
                } else {
                    alert('Error: ' + (data.message || 'Gagal menyimpan nilai'));
                }
            })
            .catch(error => {
                console.error('Error details:', error);
                alert('Terjadi kesalahan saat menyimpan nilai. Silakan coba lagi.');
            });
        });

        document.getElementById('searchInput').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                filterStudents();
            }
        });
    </script>
</body>
</html>
@endsection