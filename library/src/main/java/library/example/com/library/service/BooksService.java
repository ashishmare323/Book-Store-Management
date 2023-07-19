package library.example.com.library.service;
import java.util.List;
import org.springframework.stereotype.Service;

import library.example.com.library.model.Books;
import library.example.com.library.repository.BooksRepository;

@Service
public class BooksService {

    private final BooksRepository booksRepository;

    public BooksService(BooksRepository booksRepository){
        this.booksRepository = booksRepository;
    }

    public void addbooks(Books books){
        booksRepository.insert(books);
    }

    public void updatebooks(Books books){
        Books savedbooks = booksRepository.findById(books.getId())
            .orElseThrow(() -> new RuntimeException(
                String.format("Can not find books Data by ID %s", books.getId())));

        savedbooks.setBooksAuthor(books.getBooksAuthor());
        savedbooks.setBooksCategory(books.getBooksCategory());
        savedbooks.setBooksCount(books.getBooksCount());
        booksRepository.save(savedbooks);
    }

    public List<Books> getAllbooks(){
        return booksRepository.findAll();
    }

    public Books getbooksByName(String name){
        return booksRepository.findByName(name).orElseThrow(() -> new RuntimeException(
            String.format("Can not find books by Name %s", name)));
    }

    public void deletebooks(String id){
        booksRepository.deleteById(id);
    }
}
