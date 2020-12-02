//This is a java program to find the shortest path between source vertex and destination vertex
import java.io.*;
import java.util.HashSet;
import java.util.InputMismatchException;
import java.util.Iterator;
import java.util.Scanner;
import java.util.Set;

public class Dijkstras_Shortest_Path
{
    private int          distances[];
    private Set<Integer> settled;
    private Set<Integer> unsettled;
    private int          number_of_nodes;
    private int          adjacencyMatrix[][];
    private static int          mypath[][];
    private static int flag_path = 1;
    private static int xx;

    public Dijkstras_Shortest_Path(int number_of_nodes)
    {
        this.number_of_nodes = number_of_nodes;
        distances = new int[number_of_nodes + 1];
        settled = new HashSet<Integer>();
        unsettled = new HashSet<Integer>();
        adjacencyMatrix = new int[number_of_nodes + 1][number_of_nodes + 1];
        mypath = new int[number_of_nodes * number_of_nodes][number_of_nodes + 1];
        this.xx = xx;
    }

    public void dijkstra_algorithm(int adjacency_matrix[][], int source)
    {
        //String Path = null;
        int evaluationNode;
        for (int i = 1; i <= number_of_nodes; i++)
            for (int j = 1; j <= number_of_nodes; j++)
                adjacencyMatrix[i][j] = adjacency_matrix[i][j];

        for (int i = 1; i <= number_of_nodes; i++)
        {
            distances[i] = Integer.MAX_VALUE;
        }

        unsettled.add(source);
        distances[source] = 0;
        while (!unsettled.isEmpty())
        {
            evaluationNode = getNodeWithMinimumDistanceFromUnsettled();
            unsettled.remove(evaluationNode);
            settled.add(evaluationNode);
            evaluateNeighbours(evaluationNode);
        }

    }

    private int getNodeWithMinimumDistanceFromUnsettled()
    {
        int min;
        int node = 0;

        Iterator<Integer> iterator = unsettled.iterator();
        node = iterator.next();
        min = distances[node];
        for (int i = 1; i <= distances.length; i++)
        {
            if (unsettled.contains(i))
            {
                if (distances[i] <= min)
                {
                    min = distances[i];
                    node = i;

                }
            }
        }
        //System.out.println();
        return node;
    }

    private void evaluateNeighbours(int evaluationNode)
    {
        int edgeDistance = -1;
        int newDistance = -1;

        for (int destinationNode = 1; destinationNode <= number_of_nodes; destinationNode++)
        {
            if (!settled.contains(destinationNode))
            {
                if (adjacencyMatrix[evaluationNode][destinationNode] != Integer.MAX_VALUE)
                {
                    edgeDistance = adjacencyMatrix[evaluationNode][destinationNode];
                    newDistance = distances[evaluationNode] + edgeDistance;
                    if (newDistance < distances[destinationNode])
                    {
                        distances[destinationNode] = newDistance;
                    }
                    unsettled.add(destinationNode);

                }
            }
        }
    }

    public static int[][] read() throws IOException {

        BufferedReader bf = new BufferedReader(new FileReader("/Users/Lemon/Desktop/read.txt"));
        String textLine = new String();
        String str = new String();
        while((textLine = bf.readLine()) != null) {
            str += textLine + ",";
        }
        String[] numbers = str.split(",");
        int[][] number = new int[numbers.length][numbers.length];
        xx = number.length;
        String[] stmp = null;
        for(int i = 0; i < numbers.length; i++) {
            stmp = numbers[i].split(" ");
            for(int j = 0; j < numbers.length; j++) {
                number[i][j] = Integer.parseInt(stmp[j]);
            }
        }

        bf.close();//**一定要记得关闭文件**

        return number;
    }

    private static void write(String print) throws IOException {
        PrintWriter pw =  new  PrintWriter(  new  FileWriter(  "/Users/Lemon/Desktop/write.txt"  ) );
        pw.print(print);
        pw.close();
        System.out.println("Data saved to file successfully！！！");
    }

    public static void find(int[] buf, int a, int b) {
        if (a == b) {
            for (int i = 1; i < b; i++) {
                //System.out.print(buf[i]);
                mypath[flag_path][i] = buf[i];
            }
            flag_path++;
            //System.out.println();
        } else {// 多个字母全排列
            for (int i = a; i < b; i++) {
                int temp = buf[a];
                buf[a] = buf[i];
                buf[i] = temp;
                find(buf, a + 1, b);
                temp = buf[a];
                buf[a] = buf[i];
                buf[i] = temp;
            }
        }
    }


    private static void shortpath(int[][] adjacency_matrix, int distance, int source, int destination,int number) throws IOException {
        int x1[] = new int[number];
        String st = "short_path:"+source;
        for (int i = 1; i <= number; i++) {
            if(i<source)
                x1[i] = i;
            else if(i>source)
                x1[i-1] = i;

        }
        find(x1,1,number);

        int sum,flag1 = 0;
        for (int i = 1; i < flag_path; i++) {
            sum = 0;
            mypath[i][0] = source;
            for (int j = 1; j < number; j++) {
                //System.out.print(mypath[i][j]);
                if(adjacency_matrix[mypath[i][j-1]][mypath[i][j]] == 0 || adjacency_matrix[mypath[i][j-1]][mypath[i][j]] == Integer.MAX_VALUE)
                    break;
                else
                    sum += adjacency_matrix[mypath[i][j-1]][mypath[i][j]];
                if(mypath[i][j]==destination){
                    if(sum == distance){
                        //System.out.println(sum);
                        //System.out.println(mypath[i][j]);
                        flag1=1;
                        break;
                    }
                }

            }

            //System.out.println();
            if(flag1 == 1){
                for (int j = 1; j < number; j++){
                    st = st+"-"+mypath[i][j];
                    //System.out.println(mypath[i][j]);
                    if(mypath[i][j] == destination)
                        break;

                }
                break;
            }

        }
        write(st);
    }


    public static void main(String... arg)
    {
        int adjacency_matrix[][];
        int number_of_vertices;
        int source = 0, destination = 0;
        Scanner scan = new Scanner(System.in);
        try
        {
            read();
            number_of_vertices = xx;
            adjacency_matrix = new int[number_of_vertices + 1][number_of_vertices + 1];

            System.out.println("Reading matrix from file succeeded!!!");
            for (int i = 1; i <= number_of_vertices; i++)
            {
                for (int j = 1; j <= number_of_vertices; j++)
                {
                    adjacency_matrix[i][j] = read()[i-1][j-1];

                    if (i == j)
                    {
                        adjacency_matrix[i][j] = 0;
                        continue;
                    }
                    if (adjacency_matrix[i][j] == 0)
                    {
                        adjacency_matrix[i][j] = Integer.MAX_VALUE;
                    }

                }
            }
            for (int i = 1; i <= number_of_vertices; i++) {
                for (int j = 1; j <= number_of_vertices; j++) {
                    if((adjacency_matrix[i][j]==0||adjacency_matrix[i][j]==Integer.MAX_VALUE) && adjacency_matrix[j][i]!=0)
                        adjacency_matrix[i][j] = adjacency_matrix[j][i];
                }
            }

            System.out.println("Enter the source ");
            source = scan.nextInt();

            System.out.println("Enter the destination ");
            destination = scan.nextInt();

            Dijkstras_Shortest_Path dijkstrasAlgorithm = new Dijkstras_Shortest_Path(
                    number_of_vertices);
            dijkstrasAlgorithm.dijkstra_algorithm(adjacency_matrix, source);

            int flag = 0;
            System.out.println("The Shorted Path from " + source + " to " + destination + " is: ");
            for (int i = 1; i <= dijkstrasAlgorithm.distances.length - 1; i++)
            {
                if (i == destination){
                    if(dijkstrasAlgorithm.distances[i]!=2147483647){
                        System.out.println(source + " to " + i + " is "
                                + dijkstrasAlgorithm.distances[i]);
                        String print = source + " to " + i + " is "
                                + dijkstrasAlgorithm.distances[i];
                        flag=dijkstrasAlgorithm.distances[i];

                    }

                    else{
                        System.out.println("Not Find Path");

                    }

                }

            }
            shortpath(adjacency_matrix,flag,source,destination,number_of_vertices);
        } catch (InputMismatchException | IOException inputMismatch)
        {
            System.out.println("Wrong Input Format");
        }

        scan.close();
    }
}
