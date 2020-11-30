import java.io.BufferedReader;
import java.io.File;
import java.io.FileReader;
import java.io.IOException;

public class GraphShow {
    public static void main(String[] args) throws IOException {
        GraphWeighted graphWeighted = new GraphWeighted(false);
        NodeWeighted zero = new NodeWeighted(0, "0");
        NodeWeighted one = new NodeWeighted(1, "1");
        NodeWeighted two = new NodeWeighted(2, "2");
        NodeWeighted three = new NodeWeighted(3, "3");
        NodeWeighted four = new NodeWeighted(4, "4");
        NodeWeighted five = new NodeWeighted(5, "5");
        NodeWeighted six = new NodeWeighted(6, "6");
        NodeWeighted seven = new NodeWeighted(7, "7");
        NodeWeighted eight = new NodeWeighted(8, "8");
        // Our addEdge method automatically adds Nodes as well.
        // The addNode method is only there for unconnected Nodes,
        // if we wish to add any
        /*graphWeighted.addEdge(eight, zero, 1);
        graphWeighted.addEdge(eight, one, 5);
        graphWeighted.addEdge(zero, two, 2);
        graphWeighted.addEdge(two, five, 9);
        graphWeighted.addEdge(six, five, 2);
        graphWeighted.addEdge(seven, six, 3);
        graphWeighted.addEdge(four, seven, 1);
        graphWeighted.addEdge(one, four, 3);
        graphWeighted.addEdge(eight, three, 9);
        graphWeighted.addEdge(three, two, 4);
        graphWeighted.addEdge(three, four, 2);
        graphWeighted.addEdge(three, six, 4);
        graphWeighted.printEdges();
        graphWeighted.DijkstraShortestPath(eight, six);*/

        String filePath = "/data.txt";
        FileInputStream fin = new FileInputStream(filePath);
        InputStreamReader reader = new InputStreamReader(fin);
        BufferedReader buffReader = new BufferedReader(reader);
        String strTmp = "";
        while((strTmp = buffReader.readLine())!=null){
            System.out.println(strTmp);
            graphWeighted.addEdge(strTmp);
        }
        buffReader.close();
        graphWeighted.DijkstraShortestPath(eight, six);
    }
}
