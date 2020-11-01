import java.util.LinkedList;

public class graph {
   
    private LinkedList<Edge> adj[]; 
    private int v; // ndoe
    
    public  graph(int v) {
        this.v = v;
        this.adj = new LinkedList[v];
        for (int i = 0; i < v; i++) {
            this.adj[i] = new LinkedList<>();
        }
    }
    public void addEdge(int s, int t, int w) { // add a path
        this.adj[s].add(new Edge(s, t, w));
    }
    private class Edge{
        public int sid; // start node num
        public int tid; // end node num
        public int w; // weight
        public Edge(int sid, int tid, int w ) {
            this.sid = sid;
            this.tid = tid;
            this.w = w;
        }
    }
    
    private class Vertex{
        public int id; // ID
        public int dist; // distance from start node
        public Vertex(int id, int dist) {
            this.id = id;
            this.dist = dist;
        }
    }
    
}