package library.example.com.library.model;

import java.math.BigDecimal;

import org.springframework.data.annotation.Id;
import org.springframework.data.mongodb.core.index.Indexed;
import org.springframework.data.mongodb.core.mapping.Document;
import org.springframework.data.mongodb.core.mapping.Field;

@Document("books")
public class Books {
    @Id
    private String id;
    @Field(name = "name")
    @Indexed(unique = true) 
    private String booksName;
    @Field(name = "category")
    private BooksCategory booksCategory;
    @Field(name = "price")
    private BigDecimal booksPrice;
    @Field(name = "author")
    private BooksAuthor booksAuthor;
    @Field(name = "count")
    private BigDecimal booksCount;
    @Field(name = "isbn")
    private BigDecimal booksIsbn;

    public Books() {}

    public Books(String id, String booksName, BooksCategory booksCategory, BigDecimal booksPrice, BooksAuthor booksAuthor, BigDecimal booksCount, BigDecimal booksIsbn) 
    {
        this.id = id;
        this.booksName = booksName;
        this.booksCategory = booksCategory;
        this.booksPrice = booksPrice;
        this.booksAuthor = booksAuthor;
        this.booksCount = booksCount;
        this.booksIsbn = booksIsbn;
    }
    public String getId() {
        return id;
    }
    public void setId(String id) {
        this.id = id;
    }
    public String getBooksName() {
        return booksName;
    }
    public void setBooksName(String booksName) {
        this.booksName = booksName;
    }
    public BooksCategory getBooksCategory() {
        return booksCategory;
    }
    public void setBooksCategory(BooksCategory booksCategory) {
        this.booksCategory = booksCategory;
    }
    public BigDecimal getBooksPrice() {
        return booksPrice;
    }
    public void setBooksPrice(BigDecimal booksPrice) {
        this.booksPrice = booksPrice;
    }
    public BooksAuthor getBooksAuthor() {
        return booksAuthor;
    }
    public void setBooksAuthor(BooksAuthor booksAuthor) {
        this.booksAuthor = booksAuthor;
    }
    public BigDecimal getBooksCount() {
        return booksCount;
    }
    public void setBooksCount(BigDecimal booksCount) {
        this.booksCount = booksCount;
    }
    public BigDecimal getBooksIsbn() {
        return booksIsbn;
    }
    public void setBooksIsbn(BigDecimal booksIsbn) {
        this.booksIsbn = booksIsbn;
    }
}