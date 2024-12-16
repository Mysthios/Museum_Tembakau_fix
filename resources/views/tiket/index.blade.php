
@extends('layouts.app')

@section('title', 'Tiket Museum')

@section('content')
    <style>
      @keyframes fadeIn {
        from {
          opacity: 0;
          transform: translateY(20px);
        }
        to {
          opacity: 1;
          transform: translateY(0);
        }
      }
  
      .animate-fade-in {
        animation: fadeIn 1s ease-in-out forwards;
      }
  
      .fade-delay-1 {
        animation-delay: 0.5s;
      }
  
      .fade-delay-2 {
        animation-delay: 1s;
      }
  
      .fade-delay-3 {
        animation-delay: 1.5s;
      }
  
      .fade-delay-4 {
        animation-delay: 2s;
      }
    </style>



<div class="container mx-auto flex flex-col md:flex-row mt-10 gap-6 px-4">
  <!-- Left Section (Information) -->
  <div class="w-full md:w-1/2 h-[730px] relative rounded-lg shadow-lg overflow-hidden transform transition duration-500 hover:scale-105">
      <img src="image/tiket.jpeg" alt="Museum" class="w-full h-full object-cover rounded-lg">
      <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent p-8 flex flex-col justify-end text-white">
          <h2 class="text-4xl font-bold mb-5 animate-fade-in">Visit Prices</h2>
          <p class="text-lg mb-5 animate-fade-in fade-delay-1">Tiket hanya tersedia secara online. Pastikan Anda memesan tiket sebelum kunjungan untuk memastikan akses ke dalam museum.</p>
          <div class="space-y-4">
              <div class="opacity-0 transform translate-y-6 transition duration-500 ease-out animate-fade-in fade-delay-2">
                  <p class="text-xl font-medium">DEWASA</p>
                  <p class="text-2xl font-semibold">Rp 15.000 / Tiket</p>
              </div>
              <div class="opacity-0 transform translate-y-6 transition duration-500 ease-out animate-fade-in fade-delay-3">
                  <p class="text-xl font-medium">ANAK-ANAK</p>
                  <p class="text-2xl font-semibold">Rp 5.000 / Tiket</p>
              </div>
          </div>
      </div>
  </div>

  <!-- Right Section (Form) -->
  <div class="w-full md:w-1/2 bg-white rounded-lg shadow-lg p-6 flex flex-col h-full">
      <h2 class="text-2xl font-bold mb-4">Pesan Tiket</h2>
      @if (Session::has('fail'))
          <span class="block bg-red-100 text-red-700 p-2 rounded mb-4">{{ Session::get('fail') }}</span>
      @endif
      <form action="{{ route('tiket.index') }}" method="post" class="space-y-4 flex-grow">
          @csrf
          <div>
              <label for="full_name" class="block text-sm font-medium text-gray-700">Full Name</label>
              <input type="text" name="full_name" id="full_name" class="block w-full border border-gray-300 rounded p-2 mt-1" value="{{ old('full_name') }}" placeholder="Enter Full Name">
              @error('full_name')
                  <span class="text-red-500 text-sm">{{ $message }}</span>
              @enderror
          </div>
          <div>
              <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
              <input type="email" name="email" id="email" class="block w-full border border-gray-300 rounded p-2 mt-1" value="{{ old('email') }}" placeholder="Enter Email">
              @error('email')
                  <span class="text-red-500 text-sm">{{ $message }}</span>
              @enderror
          </div>
          <div>
              <label for="phone_number" class="block text-sm font-medium text-gray-700">Phone Number</label>
              <input type="text" name="phone_number" id="phone_number" class="block w-full border border-gray-300 rounded p-2 mt-1" value="{{ old('phone_number') }}" placeholder="Enter Phone Number">
              @error('phone_number')
                  <span class="text-red-500 text-sm">{{ $message }}</span>
              @enderror
          </div>
          <div>
              <label for="ticket_type" class="block text-sm font-medium text-gray-700">Tipe Tiket</label>
              <select name="ticket_type" id="ticket_type" class="block w-full border border-gray-300 rounded p-2 mt-1">
                <option value="dewasa">Dewasa - Rp 15.000</option>
                <option value="anak-anak">Anak-anak - Rp 5.000</option>
              </select>
              @error('ticket_type')
                  <span class="text-red-500 text-sm">{{ $message }}</span>
              @enderror
          </div>
          <div>
              <label for="ticket_quantity" class="block text-sm font-medium text-gray-700">Jumlah Tiket</label>
              <input type="number" name="ticket_quantity" id="ticket_quantity" class="block w-full border border-gray-300 rounded p-2 mt-1" placeholder="Masukkan jumlah tiket">
              @error('ticket_quantity')
                  <span class="text-red-500 text-sm">{{ $message }}</span>
              @enderror
          </div>
          <div>
              <label for="purchase_date" class="block text-sm font-medium text-gray-700">Tanggal Pembelian</label>
              <input type="date" name="purchase_date" id="purchase_date" class="block w-full border border-gray-300 rounded p-2 mt-1">
              @error('purchase_date')
                  <span class="text-red-500 text-sm">{{ $message }}</span>
              @enderror
          </div>
          <div>
            <label for="visit_date" class="block text-sm font-medium text-gray-700">Tanggal Kunjungan</label>
            <input type="date" name="visit_date" id="visit_date" class="block w-full border border-gray-300 rounded p-2 mt-1" placeholder="Pilih tanggal kunjungan">
            @error('visit_date')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
          </div>
        
          <button type="submit" class="w-full bg-green-600 text-white font-bold py-2 rounded hover:bg-green-700 transition">Pesan Tiket</button>
      </form>
  </div>
</div>
      
      
      
              



  
  
      <script src="https://unpkg.com/@popperjs/core@2"></script>
      <script src="https://unpkg.com/tippy.js@6"></script>
      <script>
          //Init tooltips
          tippy('.avatar')
      </script>

  <script>
    feather.replace()
  </script>
</body>
</html>
@endsection