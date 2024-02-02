$('.form-control').select2({
    tags: true,
    tokenSeparators: [',', ' '],
    createTag: function (params) {
        var term = $.trim(params.term);

        if (term === '') {
            return null;
        }

        


        return {
            id: term,
            text: term,
            newTag: true
        }
    }
});






            // $.ajaxSetup({
            //     headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //     }
            // });
            
        // $.ajax({
        //     url: "{{ route('add.tag') }}",
        //     type: 'POST',
        //     data: { tagName: selectedTag },
        //     success: function (data) {
        //         console.log('Tag added successfully!');
        //     },
        //     error: function (xhr, status, error) {
        //         console.log('Error adding tag:', error);
        //     }
        // });
            