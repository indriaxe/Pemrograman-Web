@extends('layouts.app')

@section('title', $berita->judul)

@section('content')
    <a href="{{ route('berita.index') }}">← Kembali ke Berita</a>

    <div class="card mt-3">
        <img src="{{ $berita->gambar ? asset('storage/'.$berita->gambar) : 'https://placehold.co/800x300?text=Berita+Desa' }}"
             class="card-img-top" style="max-height:350px; object-fit:cover;">
        <div class="card-body">
            <span class="badge badge-kategori text-white">{{ $berita->kategori }}</span>
            <small class="text-muted ms-1">
                {{ $berita->created_at->format('d M Y') }} • {{ $berita->penulis }} • <i class="bi bi-eye"></i> {{ $berita->dilihat }}
            </small>

            <h2 class="mt-3">{{ $berita->judul }}</h2>
            <p>{!! nl2br(e($berita->isi)) !!}</p>
        </div>
    </div>
@endsection
