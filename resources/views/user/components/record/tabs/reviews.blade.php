<div class="max-w-2xl mx-auto my-8 p-6 bg-gray-50 rounded-lg shadow-lg">
    <form method="POST" action="{{ route('record.review.create', ['name' => $record->name]) }}" class="mb-6">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Leave a Review</h2>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                Name
            </label>
            <input 
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                id="name" 
                name="name"
                type="text" 
                placeholder="Enter your name"
            />
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="review">
                Review
            </label>
            <textarea 
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                id="review" 
                name="review"
                placeholder="Enter your review"
                rows="4"
            ></textarea>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">
                Rating
            </label>
            <div id="starRating" class="flex space-x-1">
                <input type="radio" id="star5" name="rating" value="1" class="hidden" />
                <label for="star5" class="star cursor-pointer text-gray-300 text-2xl">&#9733;</label>

                <input type="radio" id="star4" name="rating" value="2" class="hidden" />
                <label for="star4" class="star cursor-pointer text-gray-300 text-2xl">&#9733;</label>

                <input type="radio" id="star3" name="rating" value="3" class="hidden" />
                <label for="star3" class="star cursor-pointer text-gray-300 text-2xl">&#9733;</label>

                <input type="radio" id="star2" name="rating" value="4" class="hidden" />
                <label for="star2" class="star cursor-pointer text-gray-300 text-2xl">&#9733;</label>

                <input type="radio" id="star1" name="rating" value="5" class="hidden" />
                <label for="star1" class="star cursor-pointer text-gray-300 text-2xl">&#9733;</label>
            </div>
        </div>

        @csrf

        <div class="flex items-center justify-between">
            <button 
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2" 
                type="submit"
            >
                Submit
            </button>
        </div>
    </form>
</div>

<div class="w-full bg-white shadow-md rounded-lg p-6 mt-8">
    <h2 class="text-2xl font-semibold mb-4">Comments</h2>
    <ul class="space-y-4">
        @foreach($record->reviews as $review)
            <li class="flex items-start space-x-4">
                <img class="w-10 h-10 rounded-full object-cover" src="https://via.placeholder.com/50" alt="User Avatar">
                <div>
                    <div class="text-gray-900 font-bold">{{ $review->name }}</div>
                    <div class="flex items-center">
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i <= $review->rating)
                                <svg class="w-4 h-4 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.134 3.49a1 1 0 00.95.69h3.662c.969 0 1.372 1.24.588 1.81l-2.967 2.153a1 1 0 00-.364 1.118l1.134 3.49c.3.921-.755 1.688-1.54 1.118L10 13.767l-2.967 2.153c-.784.57-1.838-.197-1.54-1.118l1.134-3.49a1 1 0 00-.364-1.118L3.3 8.927c-.784-.57-.38-1.81.588-1.81h3.662a1 1 0 00.95-.69l1.134-3.49z"/>
                                </svg>
                            @else
                                <svg class="w-4 h-4 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.134 3.49a1 1 0 00.95.69h3.662c.969 0 1.372 1.24.588 1.81l-2.967 2.153a1 1 0 00-.364 1.118l1.134 3.49c.3.921-.755 1.688-1.54 1.118L10 13.767l-2.967 2.153c-.784.57-1.838-.197-1.54-1.118l1.134-3.49a1 1 0 00-.364-1.118L3.3 8.927c-.784-.57-.38-1.81.588-1.81h3.662a1 1 0 00.95-.69l1.134-3.49z"/>
                                </svg>
                            @endif
                        @endfor
                    </div>
                    <p class="text-gray-700">{{ $review->review }}</p>
                    <span class="text-gray-500 text-sm">
                        {{ $review->created_at->diffForHumans() }}
                    </span>
                </div>
            </li>
        @endforeach
    </ul>
</div>



<script>
    document.addEventListener('DOMContentLoaded', function () {
        const stars = document.querySelectorAll('#starRating .star');
        stars.forEach((star, index) => {
            star.addEventListener('click', () => {
                highlightStars(index);
                document.querySelector(`#star${5 - index}`).checked = true;
            });
        });

        function highlightStars(index) {
            stars.forEach((star, i) => {
                if (i <= index) {
                    star.classList.add('text-yellow-500');
                    star.classList.remove('text-gray-300');
                } else {
                    star.classList.add('text-gray-300');
                    star.classList.remove('text-yellow-500');
                }
            });
        }
    });
</script>