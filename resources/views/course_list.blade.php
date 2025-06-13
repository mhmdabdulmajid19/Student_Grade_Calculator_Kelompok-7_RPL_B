{{-- resources/views/course_list.blade.php --}}
@extends('layout')

@section('content')
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mata Kuliah - Student Grade Calculator</title>
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

        .btn-cyan {
            background-color: #17a2b8;
            color: white;
        }

        .btn-cyan:hover {
            background-color: #138496;
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

            .pagination .page-link {
                width: 35px;
                height: 35px;
                font-size: 12px;
            }

            .pagination-info {
                font-size: 12px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="header">
                <h1>DAFTAR MATA KULIAH</h1>
                <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn btn-danger" style="border: none; cursor: pointer;">Keluar</button>
                </form>
            </div>

            <div class="search-box">
                <input 
                    type="text" 
                    placeholder="Cari Mata Kuliah......"
                    id="searchInput"
                    onkeyup="filterCourses()"
                >
                <button type="button" class="btn btn-primary" onclick="filterCourses()">Cari</button>
            </div>

            @if($courses->count() > 0)
                <table class="table" id="courseTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Mata Kuliah</th>
                            <th>Kelas</th>
                            <th>SKS</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($courses as $index => $course)
                        <tr class="course-row">
                            <td>{{ $loop->iteration + ($courses->currentPage() - 1) * $courses->perPage() }}</td>
                            <td class="course-code">{{ $course->code }}</td>
                            <td class="course-name">{{ $course->name }}</td>
                            <td class="course-class">{{ $course->class }}</td>
                            <td>{{ $course->sks }}</td>
                            <td>
                                <a href="{{ route('students.index', ['courseId' => $course->id]) }}" class="btn btn-cyan">Pilih</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="pagination-wrapper">
                    @if($courses->hasPages())
                        <div class="pagination">
                            {{-- Previous Page Link --}}
                            @if ($courses->onFirstPage())
                                <span class="page-item disabled">
                                    <span class="page-link" aria-hidden="true">←</span>
                                </span>
                            @else
                                <a class="page-link" href="{{ $courses->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"></a>
                            @endif

                            {{-- Pagination Elements --}}
                            @foreach ($courses->getUrlRange(1, $courses->lastPage()) as $page => $url)
                                @if ($page == $courses->currentPage())
                                    <span class="page-item active" aria-current="page">
                                        <span class="page-link">{{ $page }}</span>
                                    </span>
                                @else
                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                @endif
                            @endforeach

                            {{-- Next Page Link --}}
                            @if ($courses->hasMorePages())
                                <a class="page-link" href="{{ $courses->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"></a>
                            @else
                                <span class="page-item disabled">
                                    <span class="page-link" aria-hidden="true">→</span>
                                </span>
                            @endif
                        </div>

                        {{-- Pagination Info --}}
                        <div class="pagination-info">
                            Showing <strong>{{ $courses->firstItem() }}</strong> to <strong>{{ $courses->lastItem() }}</strong> of <strong>{{ $courses->total() }}</strong> results
                        </div>
                    @endif
                </div>
            @else
                <div style="text-align: center; padding: 3rem; color: #666;">
                    <h3>Tidak ada mata kuliah yang ditemukan</h3>
                    <p>Belum ada mata kuliah yang ditugaskan kepada Anda.</p>
                </div>
            @endif
        </div>
    </div>
        
    <script>
        function filterCourses() {
            const searchInput = document.getElementById('searchInput');
            const filter = searchInput.value.toLowerCase();
            const table = document.getElementById('courseTable');
            const rows = table.getElementsByClassName('course-row');

            for (let i = 0; i < rows.length; i++) {
                const codeCell = rows[i].getElementsByClassName('course-code')[0];
                const nameCell = rows[i].getElementsByClassName('course-name')[0];
                const classCell = rows[i].getElementsByClassName('course-class')[0];
                
                if (codeCell && nameCell && classCell) {
                    const codeText = codeCell.textContent || codeCell.innerText;
                    const nameText = nameCell.textContent || nameCell.innerText;
                    const classText = classCell.textContent || classCell.innerText;
                    
                    if (codeText.toLowerCase().indexOf(filter) > -1 || 
                        nameText.toLowerCase().indexOf(filter) > -1 ||
                        classText.toLowerCase().indexOf(filter) > -1) {
                        rows[i].style.display = "";
                    } else {
                        rows[i].style.display = "none";
                    }
                }
            }
        }

        document.getElementById('searchInput').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                filterCourses();
            }
        });
    </script>
</body>
</html>
@endsection